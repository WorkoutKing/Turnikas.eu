@include('partials._nav')
@extends('main')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Skills</h1>

    @if ($pendingSkills->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Category</th>
                    <th>Number</th>
                    <th>Points</th>
                    <th>Video</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendingSkills as $skill)
                    <tr>
                        <td>{{ $skill->user->name }}</td>
                        <td>{{ $skill->category->name }}</td>
                        <td>{{ $skill->number }}</td>
                        <td>{{ $skill->category->points }}</td>
                        <td>
                            <video width="320" height="240" controls>
                                <source src="{{ asset('storage/' . $skill->videos) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </td>
                        <td>
                            <form action="{{ route('skills.notapprove', $skill->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No skills found.</p>
    @endif
    {{ $pendingSkills->links() }}
@endsection
