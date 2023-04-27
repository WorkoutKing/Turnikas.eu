@extends('main')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Pending Skills</h1>

    @if ($pendingSkills->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Category</th>
                    <th>Number</th>
                    <th>Points</th>
                    <th>Video</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendingSkills as $skill)
                    <tr>
                        <th>{{ $skill->user->name }}</th>
                        <td>{{ $skill->category->name }}</td>
                        <td>{{ $skill->number }}</td>
                        <td>{{ $skill->category->points }}</td>
                        <td>
                            <video width="320" height="240" controls>
                                <source src="{{ asset('storage/' . $skill->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('skills.approve', $skill) }}">
                                @csrf
                                <button type="submit">Approve</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('skills.notapprove', $skill->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit">Not Approve</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No skills found that require approval.</p>
    @endif
@endsection
