@extends('main')


@section('content')
@include('partials._header')
<div class="online-users">
    <ul>
        @foreach ($onlineUsers as $onlineUser)
            <a href="{{ route('users.show', $onlineUser->id) }}">{{ $onlineUser->name }}</a>
        @endforeach
    </ul>
</div>

@endsection