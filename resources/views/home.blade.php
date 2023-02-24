@extends('layouts.app2')

@section('content')
<div class="container">
    <a href="{{ route('order.create') }}" class="w-100 btn btn-lg btn-primary mb-4" type="submit">発注する</a>
    <a href="{{ route('order.index') }}" class="w-100 btn btn-lg btn-primary" type="submit">発注状況確認</a>
    
</div>
@endsection
