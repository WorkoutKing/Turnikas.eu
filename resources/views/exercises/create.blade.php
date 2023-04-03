@extends('main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload Exercise</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('exercises.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="exercise_type" class="col-md-4 col-form-label text-md-right">Exercise Type</label>

                                <div class="col-md-6">
                                    <select id="exercise_type" class="form-control @error('exercise_type') is-invalid @enderror" name="exercise_type" required>
                                        <option value="" disabled selected>Select exercise type</option>
                                        <option value="pull-ups">Pull Ups</option>
                                        <option value="dips">Dips</option>
                                        <option value="push-ups">Push Ups</option>
                                    </select>

                                    @error('exercise_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="repetitions" class="col-md-4 col-form-label text-md-right">Repetitions</label>
                                <div class="col-md-6">
                                    <input id="repetitions" type="number" class="form-control @error('repetitions') is-invalid @enderror" name="repetitions" value="{{ old('repetitions') }}" required autocomplete="repetitions">

                                    @error('repetitions')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="youtube_link" class="col-md-4 col-form-label text-md-right">YouTube Link (required)</label>

                                <div class="col-md-6">
                                    <input id="youtube_link" type="text" class="form-control @error('youtube_link') is-invalid @enderror" name="youtube_link" value="{{ old('youtube_link') }}" autocomplete="youtube_link">

                                    @error('youtube_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Upload
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


