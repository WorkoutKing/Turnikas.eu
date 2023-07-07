<footer class="footer mt-auto py-3">
    <p class="online_f">Number of online users: <a href="/online">{{ app('App\Http\Controllers\FooterController')->getOnlineUsersCount() }}</a></p>
    <div class="container text-center">
      <span class="text-muted">&copy; Madstars, <?php echo date('Y'); ?></span>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var link = document.querySelector('.online_f a');
        link.removeAttribute('href');
      });
    </script>
</footer>
