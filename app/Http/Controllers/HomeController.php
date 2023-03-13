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
            $todayFormated = $today->format('Y-m-d');
            $orderdDatesCheck = Order::where('user_id', '=', Auth::id())->whereDate('receive_date', '>=', $todayFormated)->exists();
            $orderdDates = '';
            if ($orderdDatesCheck) {
                $orderdDates = Order::where('user_id', '=', Auth::id())->whereDate('receive_date', '>=', $todayFormated)->orderBy('receive_date', 'asc')->get();
            }
            return view('home', compact('orderdDates', 'orderdDatesCheck'));
        }
    }
}
