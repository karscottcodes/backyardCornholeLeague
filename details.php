<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backyard Cornhole League | Player Roster</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php
    include("reusable/header.php");
    ?>

    <div class="container">
        <div class="col-lg-12 px-0">
            <div class="row">

                <h1>BCL | Player Details</h1>

                <?php
                if (isset($_GET['id'])) {
                    //sanitize input
                    $playerId = mysqli_real_escape_string($connect, $_GET['id']);

                    //Build Query
                    $query = "SELECT p.*, r.*, GROUP_CONCAT(t.name) AS TeamNames, t1.name AS Team1Name, t2.name AS Team2Name
                    FROM Players p
                    INNER JOIN PlayerTeams pt ON p.id = pt.PlayerID
                    INNER JOIN Teams t ON pt.TeamID = t.id
                    INNER JOIN Results r ON (t.id = r.Team1ID OR t.id = r.Team2ID)
                    INNER JOIN Teams t1 ON r.Team1ID = t1.id
                    INNER JOIN Teams t2 ON r.Team2ID = t2.id
                    WHERE p.id = '$playerId'
                    GROUP BY p.id, r.id, t1.name, t2.name
                    ORDER BY r.date;
                    ";

                    $results = mysqli_query($connect, $query);

                    if (!$results) {
                        echo "Error Message: " . mysqli_error($connect) . ".";
                        exit;
                    }

                    if (mysqli_num_rows($results) > 0) {
                        $player = mysqli_fetch_assoc($results);

                        //Display Player Card
                        echo "<div class='card mb-3' style='max-width: 800px;'>
                        <div class='row g-0'>
                          <div class='col-sm-4'>
                            <img src='" . $player['imgsrc'] . "' class='card-img-top' alt='" . $player['fname'] . " " . $player['lname'] . " Profile Photo'>
                          </div>
                          <div class='col-sm-8'>
                            <div class='card-body'>
                              <h5 class='card-title'>" . $player['fname'] . " " . $player['lname'] . "</h5>
                              <p class='card-text'>Join Date:" . $player['playerjoin'] . "<br>Birthday: " . $player['playerdob'] . "<br>Teams: " . $player['TeamNames'] . "</p>
                            </div>
                          </div>
                        </div>
                      </div>";
                    } else {
                        echo "<p>Player Not Found</p>";
                    }
                } else {
                    echo "<p>Player Id Is Missing.</p>";
                }
                ;
                ?>
            </div>
        </div>

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