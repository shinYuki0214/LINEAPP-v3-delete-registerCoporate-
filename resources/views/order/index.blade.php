@extends('layouts.app2')

@section('content')
    <div class="container">

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">注文ID</th>
                    <th scope="col">商品名</th>
                    <th scope="col">注文数</th>
                    <th scope="col">注文日</th>
                    <th scope="col">注文状況</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($orderdDatas as $orderData)
                <tr>
                    <td>{{ $orderData->id }}</td>
                    <td>{{ $orderData->order_product }}</td>
                    <td>{{ $orderData->order_num }}</td>
                    <td>{{ $orderData->created_at }}</td>
                    <td>
                        @if($orderData->order_status == null)
                            <span style="color:red;">未処理</span>
                        @else
                            {{$orderData->order_status}}
                        @endif
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection