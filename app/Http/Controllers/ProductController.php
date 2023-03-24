<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    // 登録商品一覧
    public function index()
    {
        //
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        //
        $image = $request->file('product_img');
        // public内のitemsフォルダに保存とパスの取得
        $path = isset($image) ? $image->store('items', 'public') : '';
        Product::create([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_img' => $path,
        ]);
        return redirect('/manager/products');
    }

    public function hidden(Request $request)
    {
        $theProductId = $request->product_id;
        Product::where('id', $theProductId)->update(['hidden' => 1]);
        return to_route('product.index');
    }
    public function visible(Request $request)
    {
        $theProductId = $request->product_id;
        Product::where('id', $theProductId)->update(['hidden' => 0]);
        return to_route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $theProductId = $id;
        //
        $product = Product::where('id', $theProductId)->first();
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        //
        $image = $request->file('product_img');
        if (isset($image)) {
            // public内のitemsフォルダに保存とパスの取得
            $path = isset($image) ? $image->store('items', 'public') : '';
            Product::where('id', $request->product_id)->update([
                'product_name' => $request->product_name,
                'product_price' => $request->product_price,
                'product_img' => $path,
            ]);
        } else {
            Product::where('id', $request->product_id)->update([
                'product_name' => $request->product_name,
                'product_price' => $request->product_price,
            ]);
        }
        return to_route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
