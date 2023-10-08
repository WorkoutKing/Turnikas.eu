@include('partials._nav')
@extends('main')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif
    <div class="extra_hero_pad">
        <div class="hero_big">
            <div class="hero_h1">
                <h1 class="extra_profile">
                    DSTAR'S MADSTAR'S MADSTAR
                </h1>
            </div>
        </div>
    </div>
    <div class="profile_p">
        <div class="block_5_decoration"></div>
        <div class="block_6_decoration"></div>
        <div class="block_7_decoration"></div>
        <div class="block_8_decoration"></div>
    </div>
    <main>
        <div class="profile_section">
            @if (Auth::user()->profile_picture)
                <img class='profile_pic' src="{{ Storage::url(Auth::user()->profile_picture) }}" alt="Profile Picture">
            @else
                <p>No profile picture</p>
            @endif

            <h2>User Level</h2>
            <div>
                Total Points: {{ $totalPoints }}
            </div>
            <div>
                Unique Categories: {{ $uniqueCategoriesCount }}
            </div>
             <p>Profile picture last updated:
                {{ Auth::user()->profile_picture_updated_at ? Auth::user()->profile_picture_updated_at->diffForHumans() : 'Never' }}
            </p>
        </div>
        <div class="profile_content_width">
            <div class="admin-section">
                <p>ADMIN ZONA</p>
            <a href="{{ route('users.index') }}">Users</a>
            <a href="/categories">
                Categories Show
            </a>
            <a href="skills/pending">
                Pending skills
            </a>
            <a href="/skill">
                Skill
            </a>
            <a href="/my-skills">
                My Skills
            </a>
            <a href="/skills/create">
                Skills create
            </a>
            <a href="/exercises">
                Excercises
            </a>
            <a href="/my-exercises">
                My Excercises
            </a>
            <a href="/exercises/create">
                Excercises create
            </a>
            <a href="/exercises/pending">
                Excercises Pending
            </a>
            <a href="/logout">
                Logout
            </a>
            <a>
                Nustatymai (Soon)
            </a>
            </div>
            <div class="admin-section">
                <p>USER ZONA</p>
                <a href="/categories">
                    Categories Show
                </a>
                <a href="exercises/create">
                    Excercises create
                </a>
                <a href="/skills/create">
                    Skills create
                </a>
                <a href="/my-exercises">
                    My Excercises
                </a>
                <a href="/my-skills">
                    My Skills
                </a>
                <a>
                    Nustatymai (Soon)
                </a>
            </div>
        </div>

        <form method="POST" action="{{ route('update-profile-picture') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" name="profile_picture">
            <button type="submit">Upload</button>
        </form>


        <h1>{{ $user->name }}s Uploads</h1>
        <table>
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Name</th>
                    <th>YouTube Link</th>
                    <th>Reps NUmber or Seconds</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($uploads as $upload)
                    <tr>
                        <td>{{ $upload->category->name }}</td>
                        <td>{{ $upload->name }}</td>
                        <td>{{ $upload->youtube_link }}</td>
                        <td>{{ $upload->number }}</td>
                        <td>{{ $upload->category->points }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="card">
            <div class="card-header">{{ $user->name }}s Exercises</div>

            <div class="card-body">
                @if ($exercises->isEmpty())
                    <p>No exercises to display.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Exercise Type</th>
                                <th scope="col">Repetitions</th>
                                <th scope="col">YouTube Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exercises as $exercise)
                                <tr>
                                    <td>{{ $exercise->exercise_type }}</td>
                                    <td>{{ $exercise->repetitions }}</td>
                                    <td><a href="{{ $exercise->youtube_link }}"
                                            target="_blank">{{ $exercise->youtube_link }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </main>
@endsection
