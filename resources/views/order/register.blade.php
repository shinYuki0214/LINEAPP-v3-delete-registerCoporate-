@extends('layouts.app2')
@section('sectiontitle', '注文商品選択')

@section('content')
    <div class="col-md-5">
        <a class="btn btn-dark mb-4" href="{{ route('home') }}">トップへ</a>

        <div class="table-responsive">

            <table class="text-center table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">画像</th>
                        <th scope="col">商品名</th>
                        <th scope="col">金額</th>
                        <th scope="col">注文商品登録</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        @if (!$product->hidden)
                            <tr>
                                <td style="max-width
                            :100px;">
                                    @if ($product->product_img !== '')
                                        <img src="{{ \Storage::url($product->product_img) }}" class="products__img">
                                    @else
                                        <img src="/img/noImage.png" class="products__img">
                                    @endif
                                </td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_price }}円</td>
                                <td>

                                    @if (!Auth::user()->is_bookmark($product->id))
                                        <form action="{{ route('bookmark.store', $product) }}" method="post">
                                            @csrf
                                            <button class="btn btn-success">登録</button>
                                        </form>
                                    @else
                                        <form action="{{ route('bookmark.destroy', $product) }}" method="get">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-secondary">解除</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <a class="btn btn-dark mt-4" href="{{ route('home') }}">トップへ</a>
    </div>
@endsection
