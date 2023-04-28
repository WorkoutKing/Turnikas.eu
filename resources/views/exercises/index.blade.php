@extends('main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card">
                    <div class="card-header">Exercises</div>

                    <div class="card-body">
                        @if ($exercises->count() > 0)
                            <ul>
                                @foreach ($exercises as $exercise)
                                    <li>
                                        <strong>{{ $exercise->user->name }}:</strong>
                                        {{ ucfirst($exercise->exercise_type) }} - {{ $exercise->repetitions }} reps
                                        @if ($exercise->video)
                                              <video width="320" height="240" controls>
                                                    <source src="{{ asset('storage/' . $exercise->video) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                        @endif
                                        <form action="{{ route('exercises.delete', $exercise->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>

                            {{ $exercises->links() }}
                        @else
                            <p>No exercises found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
