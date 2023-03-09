@extends('layouts.app2')
@section('sectiontitle','お客様一覧')
@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">ライン名</th>
                    <th scope="col">登録名</th>
                    <th scope="col">登録メールアドレス</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($registerUsers as $registerUser)
                <tr>
                    <td><a href="{{ route('manager.show', ['id' => $registerUser->id]) }}">{{ $registerUser->line_name }}</a></td>
                    <td>{{ $registerUser->name }}</td>
                    <td>{{ $registerUser->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
