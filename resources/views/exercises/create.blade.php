@include('partials._nav')
@extends('main')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload Exercise</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('exercises.store') }}" enctype="multipart/form-data">
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
                                <label for="video" class="col-md-4 col-form-label text-md-right">Exercise Video</label>
                                <div class="col-md-6">
                                    <input id="video" type="file" class="form-control-file @error('video') is-invalid @enderror" name="video" accept="video/*">

                                    @error('video')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="youtube_url" class="col-md-4 col-form-label text-md-right">Youtube Video</label>
                                <div class="col-md-6">
                                    <input id="youtube_url" type="url" class="form-control-file @error('youtube_url') is-invalid @enderror" name="youtube_url" >

                                    @error('youtube_url')
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


