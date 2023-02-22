<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Order;

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
            'order_product'=> $request['order_product'],
            'order_num'=> $request['order_num'],
        ]);

        session()->flash('status', '登録okです');
        return to_route('order.index');
    }
}
