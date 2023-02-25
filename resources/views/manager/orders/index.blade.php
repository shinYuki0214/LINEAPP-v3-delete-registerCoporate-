@extends('layouts.app2')

@section('content')
    <div class="table-responsive">
        <form method="post" action="{{ route('manager.order.update') }}">
            @csrf

            <table class="table table-striped table-sm text-center">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col">バナナケーキ</th>
                        <th scope="col">ミニバナナケーキ</th>
                        <th scope="col">対応</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @if (!$user->checkedOrders())
                            <tr>
                                <td>{{ $user->name }}</td>
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
                                <td><input type="checkbox" name="change_status[]" value="{{ $user->id }}"></td>
                            </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
            <button class="btn btn-lg btn-primary mb-3">確定</button>
        </form>
    </div>
@endsection
