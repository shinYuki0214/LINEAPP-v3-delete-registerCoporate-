@extends('layouts.app2')
@section('sectiontitle', $receive_date->format('n月j日の配達'))
@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-sm text-center table-bordered">
            <thead>
                <tr>
                    <th>会社名</th>
                    @foreach ($products as $product)
                        <td>
                            {{ $product->product_name }}
                        </td>
                    @endforeach
                    <th>作成日</th>
                    <th>更新日</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @foreach ($user->orders as $order)
                        <tr>
                            @if ($receive_date->isSameDay($order->receive_date))
                                <td>{{ $user->name }}</td>
                                @foreach ($products as $product)
                                    <td>
                                        @if (isset($order['order' . $product->id]))
                                            {{ $order['order' . $product->id] }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                @endforeach
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->updated_at }}</td>
                            @endif
                        </tr>
                    @endforeach
                @endforeach

            </tbody>
        </table>
    </div>
    <a href="{{ route('manager.order.selectdate') }}" class="btn btn-primary">別日の確認</a>
@endsection
