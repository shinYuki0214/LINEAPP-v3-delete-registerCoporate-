@extends('layouts.app2')
@section('sectiontitle','未処理発注')
@section('content')
    <div class="table-responsive">
        <form method="post" action="{{ route('manager.order.update') }}">
            @csrf

            <table class="table table-striped table-sm text-center">
                <thead>
                    <tr>
                        <th></th>
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
                        <th scope="col">対応</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @if (!$user->checkedOrders())
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td scope="col">
                                    @foreach ($user->orders as $order)
                                        {{ $order->order1 }}
                                    @endforeach
                                </td>
                                <td scope="col">
                                    @foreach ($user->orders as $order)
                                        {{ $order->order2 }}
                                    @endforeach
                                </td>
                                <td scope="col">
                                    @foreach ($user->orders as $order)
                                        {{ $order->order3 }}
                                    @endforeach
                                </td>
                                <td scope="col">
                                    @foreach ($user->orders as $order)
                                        {{ $order->order4 }}
                                    @endforeach
                                </td>
                                <td scope="col">
                                    @foreach ($user->orders as $order)
                                        {{ $order->order5 }}
                                    @endforeach
                                </td>
                                <td scope="col">
                                    @foreach ($user->orders as $order)
                                        {{ $order->order6 }}
                                    @endforeach
                                </td>
                                <td scope="col">
                                    @foreach ($user->orders as $order)
                                        {{ $order->order7 }}
                                    @endforeach
                                </td>
                                <td scope="col">
                                    @foreach ($user->orders as $order)
                                        {{ $order->order8 }}
                                    @endforeach
                                </td>
                                <td scope="col">
                                    @foreach ($user->orders as $order)
                                        {{ $order->order9 }}
                                    @endforeach
                                </td>
                                <td scope="col">
                                    @foreach ($user->orders as $order)
                                        {{ $order->order10 }}
                                    @endforeach
                                </td>
                                <td scope="col">
                                    @foreach ($user->orders as $order)
                                        {{ $order->order11 }}
                                    @endforeach
                                </td>
                                <td scope="col">
                                    @foreach ($user->orders as $order)
                                        {{ $order->order12 }}
                                    @endforeach
                                </td>
                                <td scope="col">
                                    @foreach ($user->orders as $order)
                                        {{ $order->order13 }}
                                    @endforeach
                                </td>
                                <td scope="col">
                                    @foreach ($user->orders as $order)
                                        {{ $order->order14 }}
                                    @endforeach
                                </td>
                                <td><input type="checkbox" name="change_status[]" value="{{ $user->id }}"></td>
                            </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
            <button class="btn btn-lg btn-primary mb-3">確定</button>
        </form>
    </div>
@endsection
