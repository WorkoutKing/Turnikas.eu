@extends('main')


@section('content')
<header>
  <div class="container-fluid p-0 extra-header-img">
    <img src="https://uk-platform-content.s3.eu-west-2.amazonaws.com/articles/outdorrcover-2046.jpg" class="img-fluid header-image" alt="Cover Picture">
  </div>
</header>
<div class="container top_3_pos">

  <div class="top3">
    Top 3 Pull Ups
      @foreach ($usersByExerciseType['pull-ups'] as $user)
          <p>{{ $user->name }} - {{ $user->exercises->where('exercise_type', 'pull-ups')->max('repetitions') }} repetitions</p>
      @endforeach
  </div>

  <div class="top3">
  Top 3 Dips
    @foreach ($usersByExerciseType['dips'] as $user)
        <p>{{ $user->name }} - {{ $user->exercises->where('exercise_type', 'dips')->max('repetitions') }} repetitions</p>
    @endforeach
  </div>

  <div class="top3">
    Top 3 Push Ups
    @foreach ($usersByExerciseType['push-ups'] as $user)
        <p>{{ $user->name }} - {{ $user->exercises->where('exercise_type', 'push-ups')->max('repetitions') }} repetitions</p>
    @endforeach
  </div>

</div>
<div class="">
    <section class="motivation-section">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6">
              <h2>Motivational Words Here</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
            </div>
            <div class="col-md-6">
              <img src="https://c8.alamy.com/comp/2C847X1/inspirational-quotes-try-a-little-harder-to-be-a-little-better-positive-inspiration-motivation-2C847X1.jpg" alt="Motivational Image">
            </div>
          </div>
        </div>
      </section>
      <section class="about-section">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 order-2 order-md-1">
              <img src="https://media.istockphoto.com/id/1256096552/vector/about-us-rgb-color-icon.jpg?s=612x612&w=0&k=20&c=KKozSJIgaX2lu1OIRY9Oc5Rp1GhQzpTIKatBtc_4lQQ=" alt="About Us Image">
            </div>
            <div class="col-md-6 order-1 order-md-2">
              <h2>About Us</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
            </div>
          </div>
        </div>
      </section>
</div>
@endsection