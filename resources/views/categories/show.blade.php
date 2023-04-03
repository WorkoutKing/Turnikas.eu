@extends('main')


@section('content')
<h1>{{ $category->name }}</h1>
@php
  $index = 1;
@endphp

@foreach($topSkillUploaders as $user)
  <div class="top-user {{ $index == 1 ? 'top-1' : ($index == 2 ? 'top-2' : ($index == 3 ? 'top-3' : '')) }}">
    <span class="trophy {{ $index == 1 ? 'trophy-1' : ($index == 2 ? 'trophy-2' : ($index == 3 ? 'trophy-3' : '')) }}"></span>
    <span>{{ $index }}</span>
    <a>
        {{ $user->name }}
    </a>
    <span class="repetitions">
      {{ $user->number }} repetitions
    </span>
  </div>
  @php
    $index++;
  @endphp
@endforeach



@endsection