<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class ManagerOrderController extends Controller
{
    //
    public function selectdate(){
        return view('manager.orders.selectdate');
    }
    

    public function index(Request $request){
        $receive_date = new Carbon($request->receive_date);
        $today=Carbon::today();
        $tommorow =  Carbon::tomorrow();
        // $users = User::orderBy('id', 'desc')->get();
        $users = User::where('role','>=','9')->orderBy('id', 'desc')->get();

        $products = Product::all();
        return view('manager.orders.index',compact('users','receive_date','products'));
    }
}
