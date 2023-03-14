@extends('layouts.app2')
@section('sectiontitle', '商品一覧')
@section('content')
    <div class="col-md-5">

        <div class="table-responsive">
            <table class="table table-striped table-sm text-center table-bordered">
                <thead>
                    <tr>
                        <th scope="col">商品画像</th>
                        <th scope="col">商品名</th>
                        <th scope="col">商品料金</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            {{-- <td><img src="/img/noImage.png" alt="" class="products__img"></td> --}}
                            <td>

                                @if ($product->product_img !== '')
                                    <img src="{{ \Storage::url($product->product_img) }}" class="products__img">
                                @else
                                    <img src="/img/noImage.png" class="products__img">
                                @endif
                            </td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_price }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
