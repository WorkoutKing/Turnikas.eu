@extends('main')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('skills.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id" required>
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

        </div>
        <div>
            <label for="number">Number:</label>
            <input type="text" id="number" name="number" value="{{ old('number') }}">
            @error('number')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="video">Video:</label>
            <input type="file" id="video" name="video" accept="video/*" max="200000">
            @error('video')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Submit</button>
    </form>
@endsection
