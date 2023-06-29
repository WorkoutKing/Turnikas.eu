@include('partials._nav')
@extends('main')


@section('content')
@include('partials._header')
<div class="online-users">
    <ul>
        @foreach ($onlineUsers as $onlineUser)
            <a href="{{ route('profiles.show', $onlineUser->id) }}">{{ $onlineUser->name }}</a>
        @endforeach
    </ul>
</div>

@endsection