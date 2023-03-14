@extends('layouts.app2')
@section('sectiontitle', '配達日：' . $dateRecive->format('m月d日'))

@section('content')
    <div class="col-md-5">
        <div class="frm__flow">
            <a href="{{ route('home') }}" class="frm__flow-item">
                配送日選択
            </a>
            <div class="frm__flow-item frm__flow-item-active">
                注文
            </div>
            <div class="frm__flow-item">
                確認
            </div>
        </div>
        <form action="{{ route('order.check') }}" method="post">
            @csrf
            <div class="table-responsive">
                <table class="table table-sm text-center table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">商品画像</th>
                            <th scope="col">商品名</th>
                            <th scope="col">金額</th>
                            {{-- <th scope="col">個数</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td rowspan="2" style="width:100px;">
                                    @if ($product->product_img !== '')
                                        <img src="{{ \Storage::url($product->product_img) }}" class="products__img">
                                    @else
                                        <img src="/img/noImage.png" class="products__img">
                                    @endif
                                </td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_price }}円</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select name="order{{ $product->id }}" id="" class="form-select">
                                        <option value="0">注文なし</option>
                                        @for ($i = 1; $i < 200; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <input type="hidden" name="receive_date" value="{{ $dateRecive }}">
            <div class="d-flex justify-content-between">
                <a class="btn btn-dark" href="{{ route('home') }}">戻る</a>
                <button class="btn btn-primary">
                    注文
                </button>
            </div>
        </form>
    </div>
@endsection
