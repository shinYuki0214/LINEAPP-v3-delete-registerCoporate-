<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    //
    public function index(){
        $orderdDatas = Order::where('user_id', '=', Auth::id())
        ->orderBy('id','desc')
        ->paginate(10);
        return view('order.index',compact('orderdDatas'));
    }
    public function create(){
        return view('order.create');
    }
    public function store(Request $request){
        Order::create([
            'user_id' => Auth::id(),
            'order1'=> $request['order1'],
            'order2'=> $request['order2'],
        ]);

        session()->flash('status', '登録okです');
        return to_route('order.index');
    }
}
