@extends('layouts.app4')
@section('sectiontitle', 'お知らせ一覧')
@section('content')
    @foreach ($posts as $post)
        <div class="news__item">
            <div class="news__item-title">
                {{ $post->title }}
            </div>
            <div class="news__item-body">
                {{ $post->body }}
            </div>
        </div>
    @endforeach

@endsection
