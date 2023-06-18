@extends('main')


@section('content')
<header>
      <div class="nav-menu">
        <div class="branding-web">
          <a class="nav-brand-name" href='/'><img src="./images/mdlogo.png"></a>
        </div>
        <div class="nav-links">
          <ul class="top-nav">
            <li><a href="/privacy">Privacy Policy</a></li>
            <li><a href="">Inspiration</a></li>
            <li><a href="">Challenges</a></li>
            @if(Auth::check())
                <li><a href="/profile">Profile</a></li>
            @else
                <li><a href="/login">Login</a></li>
            @endif
          </ul>
        </div>
      </div>
      <div class="hero_big">
        <div class="hero_h1">
          <div class="wrapper">
            <div class="marquee">
              <h1>
                MOTIVATION DEDICATION POWER CONQUER&nbsp;MOTIVATION DEDICATION POWER CONQUER
              </h1>
            </div>
          </div>
        </div>
      </div>
      <div class="hero_blocks">
        <div class="block_1">
          <div class="block_1_divider"></div>
          <div class="block_1_mot">
            <div class="block_1_mot_deep">
              Unleash your true potential with the power of calisthenics! Dare
              to defy gravity, build insane strength, and sculpt the ultimate
              physique with our Madstars Calisthenics community.
            </div>
          </div>
        </div>
        <div class="block_2">
          <div class="block_2_img">
            <img
              src="https://images.unsplash.com/photo-1606689845968-30c7c55c71d1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8aGFuZHN0YW5kfGVufDB8fDB8fHww&w=1000&q=80"
              alt="Handstand Wide"
            />
          </div>
        </div>
        <div class="block_3">
          <div class="block_3_img">
            <img
              src="https://upload.wikimedia.org/wikipedia/commons/b/ba/Planche.jpg"
              alt="Full Planche"
            />
          </div>
        </div>
        <div class="block_4">
          <div class="block_4_img">
            <img src="https://www.mpcalisthenics.com/wp-content/uploads/2021/06/Robbie-Preston-Front-Lever.jpg"
              alt="" />
          </div>
        </div>
        <div class="block_5_decoration"></div>
        <div class="block_6_decoration"></div>
        <div class="block_7_decoration"></div>
      </div>
    </header>
      <div class="top_3">
        <div class="top_3_deep">
          <div class="pull_ups_3">
            <div class="top_3_img">
              <img src="https://cdn.shopify.com/s/files/1/1182/8528/articles/pull-ups-for-bigger-back.jpg?v=1559731548" />
            </div>
            <div class="top_3_text">
              <div class="top_3_first_line">Top Pull-ups</div>
              <div class="top_3_second">Top pull-ups crushers</div>
            </div>
            <div class="top_3_icon_1">></div>
          </div>
            <div class="top_3_pull_container">
                  Top 3 Pull Ups
                @foreach ($usersByExerciseType['pull-ups'] as $user)
                    <p>{{ $user->name }} - {{ $user->exercises->where('exercise_type', 'pull-ups')->max('repetitions') }} repetitions</p>
                @endforeach
            </div>
          <div class="dips_3">
            <div class="top_3_img">
              <img src="https://t4.ftcdn.net/jpg/03/45/30/91/360_F_345309108_JcuvEw7WiBGh6BaXRm1DfSSu7tLWUy0e.jpg" />
            </div>
            <div class="top_3_text">
              <div class="top_3_first_line">Dips Demolition</div>
              <div class="top_3_second">Dip your way to victory</div>
            </div>
            <div class="top_3_icon_2">></div>
          </div>
             <div class="top_3_dips_container">
                Top 3 Dips
                @foreach ($usersByExerciseType['dips'] as $user)
                    <p>{{ $user->name }} - {{ $user->exercises->where('exercise_type', 'dips')->max('repetitions') }} repetitions</p>
                @endforeach
            </div>
          <div class="push_ups_3">
            <div class="top_3_img">
              <img src="https://hips.hearstapps.com/hmg-prod/images/young-man-performing-press-ups-on-kettlebells-in-royalty-free-image-1585844910.jpg?crop=0.668xw:1.00xh;0.128xw,0&resize=1200:*" />
            </div>
            <div class="top_3_text">
              <div class="top_3_first_line">Push-up Powerhouse</div>
              <div class="top_3_second">Push towards greatness</div>
            </div>
            <div class="top_3_icon_3">></div>
          </div>
            <div class="top_3_push_container">
                 Top 3 Push Ups
                @foreach ($usersByExerciseType['push-ups'] as $user)
                    <p>{{ $user->name }} - {{ $user->exercises->where('exercise_type', 'push-ups')->max('repetitions') }} repetitions</p>
                @endforeach
            </div>
        </div>
      </div>
       <script>
          $(document).ready(function() {
            $('.top_3_icon_1').click(function() {
              $('.top_3_pull_container').toggleClass('show');
            });

            $('.top_3_icon_2').click(function() {
              $('.top_3_dips_container').toggleClass('show');
            });

            $('.top_3_icon_3').click(function() {
              $('.top_3_push_container').toggleClass('show');
            });
          });
        </script>
@endsection