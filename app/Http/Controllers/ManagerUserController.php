<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class ManagerUserController extends Controller
{
    //ユーザー一覧画面を作成
    public function index(){
        $registerUsers = DB::table('users')
        ->orderBy('id','desc')
        ->paginate(10);

        return view('manager.users.index',compact('registerUsers'));
    }

}
