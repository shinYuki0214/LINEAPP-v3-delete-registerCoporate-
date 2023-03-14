@extends('layouts.app2')
@section('sectiontitle', $theUser->name . ' 様')
@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-sm table-bordered">
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
        <table class="table table-striped table-sm text-center table-bordered">
            <thead>
                <tr>
                    <th>配達日</th>
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
                @foreach ($theUser->orders as $order)
                    <tr>
                        <td class="">
                            <span>
                                @php
                                    echo Carbon\Carbon::createFromFormat('Y-m-d', $order->receive_date)->format('Y/m/d');
                                @endphp
                            </span>
                        </td>

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
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

@endsection
