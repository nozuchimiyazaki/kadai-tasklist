@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{-- タスク一覧 --}}
        @include('tasks.tasks')
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to the Tasklists</h1>
            {{-- ユーザ登録へのリンク --}}
            {!! link_to_route('signup.get', 'サインアップ', [], ['class' => 'btn btn-primary']) !!} OR 
            {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    @endif

@endsection