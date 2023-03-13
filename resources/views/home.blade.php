@extends('layouts.app2')
@section('sectiontitle', '発注')
@section('content')
    <div class="container">
        {{-- @if (!$todaysOrder)
            <a href="{{ route('order.create') }}" class="w-100 btn btn-lg btn-primary mb-4" type="submit">発注する</a>
        @endif
        @if ($todaysOrder)
            <a href="{{ route('order.index') }}" class="w-100 btn btn-lg btn-primary" type="submit">発注内容を確認する</a>
        @endif --}}
        {{-- <div class="col-md-3">
            @if (!$nextMonday->copy()->subDay()->addHours(17)->lt(Carbon\Carbon::now()))
            <h2>
                直近の発注可能日
            </h2>
            <div class="mb-4">
                <div>{{ $nextMonday->format('Y年m月d日') }}（月）</div>
                <div>
                    締切：{{ $nextMonday->copy()->subDay()->format('Y年m月d日 17:00まで') }}
                </div>
                @if (!$mondayOrder)
                    <a href="{{ route('order.create', $nextMonday->format('Ymd')) }}" class="w-100 btn btn-lg btn-primary"
                        type="submit">発注する</a>
                @else
                    <a href="{{ route('order.index', $nextMonday->format('Ymd')) }}" class="w-100 btn btn-lg btn-secondary"
                        type="submit">発注済:確認</a>
                @endif
            </div>
            @endif

            @if (!$nextWednesday->copy()->subDay()->addHours(17)->lt(Carbon\Carbon::now()))
            <div class="mb-4">
                <div>{{ $nextWednesday->format('Y年m月d日') }}（水）</div>
                <div>
                    締切：{{ $nextWednesday->copy()->subDay()->format('Y年m月d日 17:00まで') }}
                </div>
                @if (!$wedenesdayOrder)
                    <a href="{{ route('order.create', $nextWednesday->format('Ymd')) }}"
                        class="w-100 btn btn-lg btn-primary" type="submit">発注する</a>
                @else
                    発注済
                    <a href="{{ route('order.index', $nextWednesday->format('Ymd')) }}"
                        class="w-100 btn btn-lg btn-secondary" type="submit">発注済:確認</a>
                @endif
            </div>
            @endif
            @if (!$nextFriday->copy()->subDay()->addHours(17)->lt(Carbon\Carbon::now()))
                <div class="mb-4">
                    <div>{{ $nextFriday->format('Y年m月d日') }}（金）</div>
                    <div>
                        締切：{{ $nextFriday->copy()->subDay()->format('Y年m月d日 17:00まで') }}
                    </div>
                    @if (!$fridayOrder)
                        <a href="{{ route('order.create', $nextFriday->format('Ymd')) }}"
                            class="w-100 btn btn-lg btn-primary" type="submit">発注する</a>
                    @else
                        発注済
                        <a href="{{ route('order.index', $nextFriday->format('Ymd')) }}"
                            class="w-100 btn btn-lg btn-secondary" type="submit">発注済:確認</a>
                    @endif
                </div>
            @endif

        </div> --}}

        <div class="frm__flow">
            <div class="frm__flow-item frm__flow-item-active">
                配達日選択
            </div>
            <div class="frm__flow-item">
                商品選択
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
                        {{ $theDate }},
                    @endforeach

                @endif
            </div>
        </div>
    </div>
@endsection
