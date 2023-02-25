<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ManagerOrderController extends Controller
{
    //
    public function index(){

        // $users = User::orderBy('id', 'desc')->get();
        $users = User::where('role','>=','9')->orderBy('id', 'desc')->get();
        $orderdDatas = Order::whereNull('order_status')
        ->get();

        // $test = Order::find(1)->user;
        // dd($test);
        return view('manager.orders.index',compact('orderdDatas','users'));
    }
    public function update(Request $request){
        $needChangeDatas = $request->change_status;
        // dd($needChangeDatas);
        $param = [
            'order_status' => '処理済み',
        ];

        foreach($needChangeDatas as $theOrderId){
            Order::where('id','=',$theOrderId)
            ->update($param);
        }
        return redirect('/manager/ordered');
    }
    public function past(){
        $users = User::where('role','>=','9')->orderBy('id', 'desc')->get();

        $orderdDatas = Order::whereNotNull('order_status')
        ->get();
        return view('manager.orders.past',compact('orderdDatas','users'));
    }
}
