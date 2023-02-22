<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class ManagerOrderController extends Controller
{
    //
    public function index(){

        $orderdDatas = DB::table('orders')
        ->whereNull('order_status')
        ->get();
        return view('manager.orders.index',compact('orderdDatas'));
    }
    public function update(Request $request){
        $needChangeDatas = $request->change_status;
        // dd($needChangeDatas);
        $param = [
            'order_status' => '処理済み',
        ];

        foreach($needChangeDatas as $theOrderId){
            DB::table('orders')
            ->where('id','=',$theOrderId)->update($param);
        }
        return redirect('/manager/ordered');
    }
    public function past(){
        $orderdDatas = DB::table('orders')
        ->whereNotNull('order_status')
        ->get();
        return view('manager.orders.past',compact('orderdDatas'));
    }
}
