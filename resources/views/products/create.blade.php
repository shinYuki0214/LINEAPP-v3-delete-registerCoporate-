@extends('layouts.app2')
@section('sectiontitle', '商品登録')
@section('content')
    <div class="col-md-5">

        <div>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
                <label for="product_name">商品名</label>
                <input type="text" class="form-control" id="product_name" placeholder="バナナケーキ" name="product_name">
                <small class="form-text text-muted">登録された商品名に対して発注が入ります。</small>
            </div>
            <div class="form-group mb-2">
                <label for="product_price">値段</label>
                <input type="text" class="form-control" id="product_price" placeholder="1000" name="product_price">
                <small class="form-text text-muted">税込で入力してください</small>
            </div>

            <div class="form-group mb-2">
                <label for="product_img">商品画像</label>
                <input type="file" class="form-control" name="product_img" id="product_img">
                <small class="form-text text-muted">商品の画像をアップロードしてください</small>
            </div>
            <button type="submit" class="btn btn-primary">登録</button>
        </form>
    </div>
@endsection
