@include('partials._nav')
@extends('main')

@section('content')
    <div class="container">
        <h1>{{ $user->name }}</h1>
        <p>Email: {{ $user->email }}</p>
        <p><img class='profile_pic' src="{{ Storage::url($user->profile_picture) }}" alt="Profile Picture"></p>
                <h2>User Level</h2>
        <div>
            Total Points: {{ $totalPoints }}
        </div>
        <div>
            Unique Categories: {{ $uniqueCategoriesCount }}
        </div>
          <div>
            Excercise uploads: {{ $exercises }}
        </div>
    </div>
@endsection
