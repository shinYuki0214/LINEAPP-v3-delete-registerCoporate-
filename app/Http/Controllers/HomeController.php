<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user->name);
        if (($user->name == '')) {
            return to_route('lineregister.index');
        } else {
            $today = Carbon::today();
            $nextMonday = $today->copy()->next(Carbon::MONDAY);
            $nextWednesday = $today->copy()->next(Carbon::WEDNESDAY);
            $nextFriday = $today->copy()->next(Carbon::FRIDAY);
    
            $tommorow =  Carbon::tomorrow();
            $mondayOrder = Order::where('user_id', '=', Auth::id())->whereDate('receive_date', $nextMonday)->exists();
            $wedenesdayOrder = Order::where('user_id', '=', Auth::id())->whereDate('receive_date', $nextWednesday)->exists();
            $fridayOrder = Order::where('user_id', '=', Auth::id())->whereDate('receive_date', $nextFriday)->exists();
            return view('home',compact('tommorow','mondayOrder','wedenesdayOrder','fridayOrder'));
        }
    }
}
