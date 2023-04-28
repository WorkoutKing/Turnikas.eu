@extends('main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Pending Exercises') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($exercises->isEmpty())
                            <p>No exercises pending approval.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Exercise Type</th>
                                        <th scope="col">Repetitions</th>
                                        <th scope="col">User</th>
                                        <th scope="col">YouTube Link</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exercises as $exercise)
                                        <tr>
                                            <td>{{ $exercise->exercise_type }}</td>
                                            <td>{{ $exercise->repetitions }}</td>
                                            <td>{{ $exercise->user->name }}</td>
                                            <td>
                                                <video width="320" height="240" controls>
                                                    <source src="{{ asset('storage/' . $exercise->video) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('exercises.approve', $exercise) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-primary">Approve</button>
                                                </form>
                                                <form action="{{ route('exercises.delete', $exercise->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
