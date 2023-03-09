@extends('layouts.app2')
@section('sectiontitle', $theUser->name . ' 様')
@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">会社名</th>
                    <th scope="col">ライン名</th>
                    <th scope="col">メールアドレス</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>{{ $theUser->name }}</td>
                    <td>{{ $theUser->line_name }}</td>
                    <td>{{ $theUser->email }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm text-center">
            <thead>
                <tr>
                    <th>配達日</th>
                    <th scope="col">バナナケーキ</th>
                    <th scope="col">ミニバナナケーキ</th>
                    <th scope="col">ミニバナナケーキ　6個入</th>
                    <th scope="col">バナナケーキ（ポケモン）</th>
                    <th scope="col">ミニバナナケーキ6個入（ポケモン）</th>
                    <th scope="col">美ら恋ガレット単品</th>
                    <th scope="col">美ら恋ガレット4個入り</th>
                    <th scope="col">美ら恋ガレット８個入り</th>
                    <th scope="col">宮古島スティック　バナナ</th>
                    <th scope="col">宮古島スティック　紅芋黒糖</th>
                    <th scope="col">宮古島スティック　黒糖</th>
                    <th scope="col">下地島専用宮古島スティック　6本入</th>
                    <th scope="col">バナナラスク　25ｇ</th>
                    <th scope="col">バナナラスク　3個入</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($theUser->orders as $order)
                    <tr>
                        <td class="">
                            <span>
                                @php
                                    echo Carbon\Carbon::createFromFormat('Y-m-d', $order->receive_date)->format('Y/m/d');
                                @endphp
                            </span>
                        </td>
                        <td> {{ $order->order1 }}</td>
                        <td> {{ $order->order2 }}</td>
                        <td> {{ $order->order3 }}</td>
                        <td> {{ $order->order4 }}</td>
                        <td> {{ $order->order5 }}</td>
                        <td> {{ $order->order6 }}</td>
                        <td> {{ $order->order7 }}</td>
                        <td> {{ $order->order8 }}</td>
                        <td> {{ $order->order9 }}</td>
                        <td> {{ $order->order10 }}</td>
                        <td> {{ $order->order11 }}</td>
                        <td> {{ $order->order12 }}</td>
                        <td> {{ $order->order13 }}</td>
                        <td> {{ $order->order14 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
