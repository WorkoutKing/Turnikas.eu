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
                <th>YouTube Link</th>
                <th>Number</th>
                <th>Points</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendingSkills as $skill)
                <tr>
                    <th>{{ $skill->user->name}}</th>
                    <td>{{ $skill->category->name }}</td>
                    <td><a href="{{ $skill->youtube_link }}" target="_blank">{{ $skill->youtube_link }}</a></td>
                    <td>{{ $skill->number }}</td>
                    <td>{{ $skill->category->points }}</td>
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