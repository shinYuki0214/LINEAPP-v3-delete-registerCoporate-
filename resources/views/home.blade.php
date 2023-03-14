@extends('layouts.app2')
@section('sectiontitle', '発注')
@section('content')
    <div class="col-md-5">
        <div class="frm__flow">
            <div class="frm__flow-item frm__flow-item-active">
                配達日選択
            </div>
            <div class="frm__flow-item">
                注文
            </div>
            <div class="frm__flow-item">
                確認
            </div>
        </div>
        <div>
            <label for="orderDate">配達日</label>
            <form action="{{ route('order.create') }}" method="post">
                @csrf
                <input type="text" class="js__calendar form-control mb-4" name="receive_date">
                <button class="btn btn-primary">発注</button>
            </form>

        </div>
        <div class="card mt-4">
            <div class="card-header">
                発注済み
            </div>
            <div class="card-body">
                @if ($orderdDatesCheck)
                    @foreach ($orderdDates as $orderdDate)
                        @php
                            $_theDate = new Carbon\Carbon($orderdDate->receive_date);
                            $theDate = $_theDate->format('n月j日');
                        @endphp
                        <a href="{{route('order.index',$orderdDate->id)}}">{{ $theDate }}</a>,
                    @endforeach
                @endif
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                その他
            </div>
            <div class="card-body">
                <a href="{{route('order.register')}}" class="btn btn-primary">発注商品選択</a>
            </div>
        </div>
    </div>
@endsection
