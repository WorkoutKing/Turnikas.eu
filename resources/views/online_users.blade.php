@extends('main')


@section('content')
@include('partials._header')
<div class="online-users">
    <ul>
        @foreach ($onlineUsers as $onlineUser)
            <li>{{ $onlineUser->name }}</li>
        @endforeach
    </ul>
</div>

@endsection