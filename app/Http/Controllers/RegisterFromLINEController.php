<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class RegisterFromLINEController extends Controller
{
    //
    public function index()
    {
        return view('register.index');
    }

    public function update(Request $request)
    {
        $user_id = Auth::id();
        User::where('id', '=', $user_id)
            ->update(
                [
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => $request['password'],
                ]
            );

            return to_route('home');
    }
}
