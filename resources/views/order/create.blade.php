@extends('layouts.app2')

@section('content')
    <div class="container">
        <form action="{{route('order.store')}}" method="post">
            @csrf
            <div class="mb-4">
                <label for="order_product" class="form-label">注文商品</label>
                <div class="input-group has-validation">
                    <select name="order_product" id="">
                        <option value=""></option>
                        <option value="バナナケーキ1">バナナケーキ1</option>
                        <option value="バナナケーキ2">バナナケーキ2</option>
                        <option value="バナナケーキ3">バナナケーキ3</option>
                    </select>
                    {{-- <input type="text" name="order_product" class="form-control" id="order_product" placeholder="注文商品" required=""> --}}
                </div>
            </div>
            <div class="mb-4">
                <label for="order_num" class="form-label">注文商品</label>
                <div class="input-group has-validation">
                    <input type="num" name="order_num" class="form-control" id="order_num" placeholder="注文数" required="">
                    <select name="order_num" id="">
                        <option value=""></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-primary btn-lg">
                注文
            </button>
        </form>
    </div>
@endsection
