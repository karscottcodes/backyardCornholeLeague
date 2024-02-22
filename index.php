<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Backyard Cornhole League</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <?php
  include("reusable/header.php");
  ?>
  <div id="hero" class="container mb-5">
    <div class="row">
      <div class="col">
        <div class="px-4 py-5 my-5 text-center">
          <img class="d-block mx-auto mb-4" src="imgs/logo.png" alt="" width="250" height="auto">
          <h1 class="display-5 fw-bold text-body-warning">Backyard Cornhole League</h1>
        </div>
      </div>
    </div>
  </div>

  <?php

  //Create Query
  
  $query = "SELECT * FROM `leaguestandings`;";

  //Execute Query
  
  $standings = mysqli_query($connect, $query);

  if (!$standings) {
    echo 'Error Message: ' . mysqli_error($connect) . '.';
    exit;
  }
  ?>

  <div class="container">
    <div class="row">
      <table class="table table-striped">
        <tr>
          <th scope="col">Team Name:</th>
          <th scope="col">Games Played:</th>
          <th scope="col">Wins:</th>
          <th scope="col">Losses:</th>
          <th scope="col">Win %</th>
          <th scope="col">Points For:</th>
          <th scope="col">Points Against:</th>
        </tr>

        <?php

        // Loop Through Result Records
        foreach ($standings as $standing) {

          echo '<tr>
                        <td>' . $standing['TeamName'] . '</td>
                        <td>' . $standing['TotalGames'] . '</td>
                        <td>' . $standing['Wins'] . '</td>
                        <td>' . $standing['Losses'] . '</td>
                        <td>' . $standing['WinningPercentage'] . '</td>
                        <td>' . $standing['PointsScoredFor'] . '</td>
                        <td>' . $standing['PointsScoredAgainst'] . '</td>
                      </tr>';

        }
        ?>
      </table>
    </div>
  </div>
  <?php
  include("reusable/footer.php");
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="main.js"></script>
</body>

</html>