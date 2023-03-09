<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class ManagerOrderController extends Controller
{
    //
    public function index(){

        $today=Carbon::today();

        $tommorow =  Carbon::tomorrow();
        // $users = User::orderBy('id', 'desc')->get();
        $users = User::where('role','>=','9')->orderBy('id', 'desc')->get();
        $orderdDatas = Order::whereNull('order_status')
        ->get();

        return view('manager.orders.index',compact('orderdDatas','users','today','tommorow'));
    }
    
    // public function update(Request $request){
    //     $needChangeDatas = $request->change_status;
    //     // dd($needChangeDatas);
    //     $param = [
    //         'order_status' => '処理済み',
    //     ];

    //     foreach($needChangeDatas as $theOrderId){
    //         Order::where('id','=',$theOrderId)
    //         ->update($param);
    //     }
    //     return redirect('/manager/ordered');
    // }
    public function past(){
        // $users = User::orderBy('id', 'desc')->get();
        $users = User::where('role','>=','9')->orderBy('id', 'desc')->get();

        $orderdDatas = Order::whereNotNull('order_status')
        ->get();
        return view('manager.orders.past',compact('orderdDatas','users'));
    }
}
