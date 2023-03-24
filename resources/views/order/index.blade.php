@extends('layouts.app2')
@section('sectiontitle', '配達日：'.$ordered->receive_date)

@section('content')
    <div class="col-md-5">
        @csrf
        <div class="table-responsive">
            <table class="table table-striped table-sm table-bordered">
                <tr>
                    <th scope="col">配達日</th>
                    <td>{{ $ordered->receive_date }}</td>
                </tr>
                @foreach ($products as $index => $product)
                    @php
                        $index++;
                    @endphp
                    <tr>
                        <th scope="col">{{ $product->product_name }}</th>

                        <td>
                            @if (is_null($ordered['order' . $index]))
                                -
                            @else
                                {{ $ordered['order' . $index] }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="d-flex justify-content-between">
            <a class="btn btn-dark" href="{{ route('home') }}">戻る</a>
        
            @php
                $now = \Carbon\Carbon::now();
                $nowtime = $now->hour * 60 + $now->minute;
                $targetTime = 17 * 60 + 00;
                $tommorow = \Carbon\Carbon::tomorrow();
                $theReciveDate = \Carbon\Carbon::parse($ordered->receive_date);
                $checktargetDate = $tommorow->gte($theReciveDate);
                $check17 = $nowtime > $targetTime;
            @endphp
            @if($check17 && $checktargetDate)
            @else
            <form action="{{ route('order.create') }}" method="post">
                @csrf
                <input type="hidden" name="receive_date" value="{{ $ordered->receive_date }}">
                <button class="btn btn-primary">変更する</button>
            </form>
            @endif
        </div>
    </div>
@endsection
