@extends('layouts.app2')
@section('sectiontitle', '発注日選択')
@section('content')
    <div class="col-md-5">

        <div>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <form action="{{ route('manager.order.index') }}" method="get">
            <div class="form-group mb-2">
                <label for="date">配達日選択</label>
                <input type="text" class="js__calendar2 form-control" name="receive_date" readonly>
                <small class="form-text text-muted">配達日の発注を確認</small>
            </div>
            <button type="submit" class="btn btn-primary">確認</button>
        </form>
    </div>
@endsection
