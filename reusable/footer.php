<div class="container">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
    <?php
      foreach ($menuLinks as $menuLink) {
        echo "<li><a href='" . $menuLink['href'] . "' class='nav-link px-2'>" . $menuLink['name'] . "</a></li>";
      }
      ?>
    </ul>
    <p class="text-center text-body-secondary">&copy; <?php echo date('Y'); ?> KARScott | codes</p>
  </footer>
</div>