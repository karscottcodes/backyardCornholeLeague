<?php
include("includes/connect.php");
?>

<?php
//CREATE A QUERY
$query = "SELECT * from `menuLinks` ORDER BY `weight` ASC";

$menuLinks = mysqli_query($connect, $query);

if (!$menuLinks) {
  echo 'Error Message: ' . mysqli_error($connect) . "<br>";
  exit;
}

?>
<div class="container">
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <div class="col-md-4 mb-2 mb-md-0 d-flex align-items-center">
      <a class="navbar-brand" href="index.php">
        <img src="imgs/logo_colour.svg" id="site-logo" alt="Logo" class="d-inline-block align-text-top">
      </a>
    </div>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <?php
      foreach ($menuLinks as $menuLink) {
        echo "<li><a href='" . $menuLink['href'] . "' class='nav-link px-2'>" . $menuLink['name'] . "</a></li>";
      }
      ?>
    </ul>

    <div class="col-md-3 text-end">
      <a class="btn btn-outline-warning me-2" href="admin.php">Admin</a>
    </div>
  </header>
</div>
