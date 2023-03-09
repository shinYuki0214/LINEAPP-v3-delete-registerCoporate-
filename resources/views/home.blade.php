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
        <div class="col-md-3">
            @if (!$nextMonday->copy()->subDay()->addHours(17)->lt(Carbon\Carbon::now()))

            <div class="mb-4">
                <h3>{{ $nextMonday->format('Y年m月d日') }}（月）</h3>
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
                <h3>{{ $nextWednesday->format('Y年m月d日') }}（水）</h3>
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
                    <h3>{{ $nextFriday->format('Y年m月d日') }}（金）</h3>
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

        </div>
    </div>
@endsection
