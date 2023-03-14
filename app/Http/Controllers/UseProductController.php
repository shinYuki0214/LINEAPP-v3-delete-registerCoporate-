<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use宣言追加
use App\Models\Product;
use App\Models\useProducts;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class useProductController extends Controller
{
    //
    public function store($productId) {
        $user = Auth::user();
        if (!$user->is_bookmark($productId)) {
            $user->bookmark_products()->attach($productId);
        }
        return back();
    }
    public function destroy($productId) {
        $user = Auth::user();
        if ($user->is_bookmark($productId)) {
            $user->bookmark_products()->detach($productId);
        }
        return back();
    }
}
