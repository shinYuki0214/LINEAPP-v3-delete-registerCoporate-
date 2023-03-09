@extends('layouts.app2')
@section('sectiontitle', $dateRecive->format('Y年m月d日の発注'))

@section('content')
    <div class="container">
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
                    <tr>
                        <td>バナナケーキ</td>
                        <td>740円</td>
                        <td>
                            {{ $orderdDatas['order1'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>ミニバナナケーキ</td>
                        <td>200円</td>
                        <td>
                            {{ $orderdDatas['order2'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>ミニバナナケーキ 6個入</td>
                        <td>1200円</td>
                        <td>
                            {{ $orderdDatas['order3'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>バナナケーキ（ポケモン）</td>
                        <td>740円</td>
                        <td>

                            {{ $orderdDatas['order4'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>ミニバナナケーキ 6個入（ポケモン）</td>
                        <td>1200円</td>
                        <td>

                            {{ $orderdDatas['order5'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>美ら恋ガレット単品</td>
                        <td>183円</td>
                        <td>

                            {{ $orderdDatas['order6'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>美ら恋ガレット4個入り</td>
                        <td>734円</td>
                        <td>
                            {{ $orderdDatas['order7'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>美ら恋ガレット８個入り</td>
                        <td>1468円</td>
                        <td>
                            {{ $orderdDatas['order8'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>宮古島スティック　バナナ</td>
                        <td>172円</td>
                        <td>
                            {{ $orderdDatas['order9'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>宮古島スティック　紅芋黒糖</td>
                        <td>172円</td>
                        <td>
                            {{ $orderdDatas['order10'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>宮古島スティック　黒糖</td>
                        <td>172円</td>
                        <td>
                            {{ $orderdDatas['order11'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>下地島専用宮古島スティック　6本入</td>
                        <td>1036円</td>
                        <td>
                            {{ $orderdDatas['order12'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>バナナラスク　25ｇ</td>
                        <td>230円</td>
                        <td>
                            {{ $orderdDatas['order13'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>バナナラスク　3個入</td>
                        <td>690円</td>
                        <td>
                            {{ $orderdDatas['order14'] }}
                        </td>
                    </tr>
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
                <button class="btn btn-primary btn-lg">
                    確定する
                </button>
            </form>
        </div>
    </div>
@endsection
