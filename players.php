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

                <h1>BCL | Player Roster</h1>

                <?php
                //Build Query
                $query = "SELECT p.*, GROUP_CONCAT(t.name) AS TeamNames
                              FROM Players p
                              LEFT JOIN PlayerTeams pt ON p.id = pt.PlayerId
                              LEFT JOIN Teams t ON pt.TeamId = t.id
                              GROUP BY p.id
                              ORDER BY p.lname";

                $players = mysqli_query($connect, $query);

                if (!$players) {
                    echo "Error Message: " . mysqli_error($connect) . ".";
                    exit;
                }

                echo "<p>The query found: " . mysqli_num_rows($players) . " results.</p><br>";
                ?>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-md-3 g-4">

                    <?php
                    //Loop Through Player Records
                    foreach ($players as $player) {
                        echo "
                        <div class='col'>
                            <div class='card h-100'>
                                <img src=" . $player['imgsrc'] . " class='card-img-top' alt='" . $player['fname'] . " " . $player['lname'] . " Profile Photo'>
                                <div class='card-body'>
                                    <h5 class='card-title'>" . $player['fname'] . " " . $player['lname'] . "</h5>
                                    <p class='card-text'>Join Date:" . $player['playerjoin'] . "<br>Birthday: " . $player['playerdob'] . "<br>Teams: ".$player['TeamNames']."</p>
                                </div>
                                <div class='card-footer text-body-secondary text-center'>
                                    <form>
                                        <input type='hidden' value='".$player['id']."'>
                                        <a class='btn btn-outline-info' href='details.php?id=".$player['id']."'>Player Details</a>
                                    </form>
                                </div>
                            </div> 
                        </div>
                        ";
                    }
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