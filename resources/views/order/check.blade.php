@extends('layouts.app2')
@section('sectiontitle', '配達日：' . $dateRecive->format('n月j日'))

@section('content')
    <div class="col-md-5">
        <div class="frm__flow">
            <a href="{{ route('home') }}" class="frm__flow-item">
                配送日選択
            </a>
            <div class="frm__flow-item">
                注文
            </div>
            <div class="frm__flow-item frm__flow-item-active">
                確認
            </div>
        </div>
        @csrf
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">商品名</th>
                        <th scope="col">金額</th>
                        <th scope="col">個数</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td> {{ $product->product_name }}</td>
                            <td> {{ $product->product_price }}</td>
                            <td>
                                {{ $orderdDatas['order' . $product->id] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <form action="{{ route('order.store') }}" method="post">
                @csrf
                <input type="hidden" name="order1" value="{{ $orderdDatas['order1'] }}">
                <input type="hidden" name="order2" value="{{ $orderdDatas['order2'] }}">
                <input type="hidden" name="order3" value="{{ $orderdDatas['order3'] }}">
                <input type="hidden" name="order4" value="{{ $orderdDatas['order4'] }}">
                <input type="hidden" name="order5" value="{{ $orderdDatas['order5'] }}">
                <input type="hidden" name="order6" value="{{ $orderdDatas['order6'] }}">
                <input type="hidden" name="order7" value="{{ $orderdDatas['order7'] }}">
                <input type="hidden" name="order8" value="{{ $orderdDatas['order8'] }}">
                <input type="hidden" name="order9" value="{{ $orderdDatas['order9'] }}">
                <input type="hidden" name="order10" value="{{ $orderdDatas['order10'] }}">
                <input type="hidden" name="order11" value="{{ $orderdDatas['order11'] }}">
                <input type="hidden" name="order12" value="{{ $orderdDatas['order12'] }}">
                <input type="hidden" name="order13" value="{{ $orderdDatas['order13'] }}">
                <input type="hidden" name="order14" value="{{ $orderdDatas['order14'] }}">
                <input type="hidden" name="receive_date" value="{{ $orderdDatas['receive_date'] }}">
                <div class="d-flex justify-content-between">
                    <a class="btn btn-dark" href="{{ route('home') }}">やり直す</a>
                    <button class="btn btn-primary">
                        確定する
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
