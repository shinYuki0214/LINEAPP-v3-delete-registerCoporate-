<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class ManagerUserController extends Controller
{
    //ユーザー一覧画面を作成
    public function index(){
        $registerUsers = DB::table('users')
        ->where('role', '>=', '9')
        ->orderBy('id','desc')
        ->paginate(10);

        return view('manager.users.index',compact('registerUsers'));
    }
    public function show($id){
        // dd($id);
        $theUser = User::findOrfail($id);
        $products = Product::all();
        return view('manager.users.show',compact('theUser','products'));
    }

}
