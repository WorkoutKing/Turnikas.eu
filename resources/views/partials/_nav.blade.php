<header style="min-height: fit-content;padding: 20px;">
   <div class="nav-menu">
      <div class="branding-web">
         <a class="nav-brand-name" href='/'><img src="../images/mdlogo.png"></a>
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
</header>