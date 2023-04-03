<footer class="footer mt-auto py-3">
    <div class="container text-center">
      <span class="text-muted">&copy; Your Company Name, <?php echo date('Y'); ?></span>
    </div>
    <p>Number of online users: <a href="/online">{{ app('App\Http\Controllers\FooterController')->getOnlineUsersCount() }}</a></p>
</footer>
