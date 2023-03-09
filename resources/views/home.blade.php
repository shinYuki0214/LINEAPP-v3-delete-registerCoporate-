@extends('layouts.app2')

@section('content')
    <div class="container">
        @if (!$todaysOrder)
            <a href="{{ route('order.create') }}" class="w-100 btn btn-lg btn-primary mb-4" type="submit">発注する</a>
        @endif
        @if ($todaysOrder)
            <a href="{{ route('order.index') }}" class="w-100 btn btn-lg btn-primary" type="submit">発注内容を確認する</a>
        @endif
    </div>
@endsection
