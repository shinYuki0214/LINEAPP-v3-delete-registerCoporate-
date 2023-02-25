@extends('layouts.app2')

@section('content')
    <div class="table-responsive">

        <table class="table table-striped table-sm text-center">
            <thead>
                <tr>
                    <th></th>
                    <th scope="col">ステータス</th>
                    <th scope="col">バナナケーキ</th>
                    <th scope="col">ミニバナナケーキ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if ($user->checkedOrders())
                        <tr>
                            <td scope="col">{{ $user->name }}</td>
                            <td scope="col">
                                @foreach ($user->orders as $order)
                                    {{ $order->order_status }}
                                    @if (is_null($order->order_status))
                                        未確定
                                    @else
                                        {{ $order->order_status }}
                                    @endif
                                @endforeach
                            </td>
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
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
