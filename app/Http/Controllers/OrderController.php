<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    //
    public function index()
    {
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        $orderdDatas = Order::where('user_id', '=', Auth::id())
            ->whereDate('created_at',$today)
            ->first();
        return view('order.index', compact('orderdDatas','today','tomorrow'));
    }
    public function create()
    {
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();

        return view('order.create',compact('today','tomorrow'));
    }
    public function check(Request $request){
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        $orderdDatas = $request;
        return view('order.check', compact('orderdDatas','today','tomorrow'));
    }
    public function store(Request $request)
    {
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        $todaysOrder = Order::where('user_id', '=', Auth::id())->whereDate('created_at', $today)->exists();
        if (!$todaysOrder) {
            Order::create([
                'user_id' => Auth::id(),
                'order1' => $request['order1'],
                'order2' => $request['order2'],
                'order3' => $request['order3'],
                'order4' => $request['order4'],
                'order5' => $request['order5'],
                'order6' => $request['order6'],
                'order7' => $request['order7'],
                'order8' => $request['order8'],
                'order9' => $request['order9'],
                'order10' => $request['order10'],
                'order11' => $request['order11'],
                'order12' => $request['order12'],
                'order13' => $request['order13'],
                'order14' => $request['order14'],
            ]);
        } else {
            Order::where('user_id', '=', Auth::id())->whereDate('created_at', $today)->update(
                [
                    'order1' => $request['order1'],
                    'order2' => $request['order2'],
                    'order3' => $request['order3'],
                    'order4' => $request['order4'],
                    'order5' => $request['order5'],
                    'order6' => $request['order6'],
                    'order7' => $request['order7'],
                    'order8' => $request['order8'],
                    'order9' => $request['order9'],
                    'order10' => $request['order10'],
                    'order11' => $request['order11'],
                    'order12' => $request['order12'],
                    'order13' => $request['order13'],
                    'order14' => $request['order14'],
                ]
            );
        }

        session()->flash('status', '登録okです');
        return to_route('order.index');
    }
}
