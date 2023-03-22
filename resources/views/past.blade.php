@extends('layouts.app2')
@section('sectiontitle', '発注システム')
@section('content')
    @can('manager-higher')
    @else

    <a class="btn btn-dark mb-4" href="{{ route('home') }}">トップへ</a>
        <div class="col-md-5">
            <div class="card mt-4">
                <div class="card-header">
                    発注済み
                </div>
                <div class="card-body">
                    @if ($orderdDatesCheck)
                        @foreach ($orderdDates as $orderdDate)
                            @php
                                $_theDate = new Carbon\Carbon($orderdDate->receive_date);
                                $theDate = $_theDate->copy()->format('n月j日');
                            @endphp
                            <a href="{{ route('order.index', $orderdDate->id) }}">{{ $theDate }}</a>,
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        {{-- <input type="hidden" name="nousedate" id="nousedate" value="@foreach ($nousedates as $nousedate){{$nousedate.','}}@endforeach"> --}}
    @endcan


@endsection
