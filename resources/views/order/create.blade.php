@extends('layouts.app2')

@section('content')
    <div class="container">
        <form action="{{route('order.store')}}" method="post">
            @csrf
            <div class="mb-4">
                <label for="order_product" class="form-label">注文商品</label>
                <div class="input-group has-validation">
                    <input type="text" name="order_product" class="form-control" id="order_product" placeholder="注文商品" required="">
                </div>
            </div>
            <div class="mb-4">
                <label for="order_num" class="form-label">注文商品</label>
                <div class="input-group has-validation">
                    <input type="num" name="order_num" class="form-control" id="order_num" placeholder="注文数" required="">
                </div>
            </div>
            <button class="btn btn-primary btn-lg">
                注文
            </button>
        </form>
    </div>
@endsection
