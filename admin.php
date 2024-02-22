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

    <?php
    $queryPlayers = "SELECT * FROM Players p ORDER BY id;";
    $queryTeams = "SELECT * FROM Teams t ORDER BY id";
    $queryResults = "SELECT r.*, t1.name AS Team1Name, t2.name AS Team2Name
                    FROM Results r 
                    INNER JOIN Teams t1 ON r.Team1Id = t1.id
                    INNER JOIN Teams t2 ON r.Team2Id = t2.id
                    ORDER BY r.date DESC";

    $players = mysqli_query($connect, $queryPlayers);
    $teams = mysqli_query($connect, $queryTeams);
    $results = mysqli_query($connect, $queryResults);

    if (!$players || !$teams || !$results) {
        echo "Error Message: " . mysqli_error($connect) . "<br>";
        exit;
    }

    ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3>Admin Commands</h3>
                <h4>Players</h4>
                <div>
                    <a class="btn btn-success" href="add-player.php">+ Add New Player</a>
                </div>
                <table class="table table-striped mt-3">
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Edit Player</th>
                        <th scope="col">Delete Player</th>
                    </tr>
                    <?php
                    foreach ($players as $player) {
                        echo "
                        <tr>
                            <td scope='col'>" . $player['fname'] . "</td>
                            <td scope='col'>" . $player['lname'] . "</td>
                            <td scope='col'><form method='post' action='update-player.php'>
                            <input type='hidden' name='id' value='" . $player['id'] . "'>
                            <button type='submit' class='btn btn-sm btn-info' name='editPlayer'>Edit Player</button>
                        </form></td>
                            <td scope='col'><form method='get' action='includes/deletePlayer.php'>
                            <input type='hidden' name='id' value='" . $player['id'] . "'>
                            <button type='submit' class='btn btn-sm btn-danger' name='deletePlayer'>Delete Player</button>
                        </form></td>
                        </tr>
                         ";
                    }
                    ?>
                </table>
            </div>
        </div>
        <h4>Teams</h4>
        <div>
            <a class="btn btn-success" href="add-team.php">+ Add New Team</a>
        </div>
        <table class="table table-striped mt-3">
            <tr>
                <th scope="col">Team Name</th>
                <th scope="col">Edit Team</th>
                <th scope="col">Delete Team</th>
            </tr>
            <?php
            foreach ($teams as $team) {
                echo "
                        <tr>
                            <td scope='col'>" . $team['name'] . "</td>
                            <td scope='col'><form method='post' action='update-team.php'>
                            <input type='hidden' name='id' value='" . $team['id'] . "'>
                            <button type='submit' class='btn btn-sm btn-info' name='editTeam'>Edit Team</button>
                        </form></td>
                            <td scope='col'><form method='get' action='includes/deleteTeam.php'>
                            <input type='hidden' name='id' value='" . $team['id'] . "'>
                            <button type='submit' class='btn btn-sm btn-danger' name='deleteTeam'>Delete Team</button>
                        </form></td>
                        </tr>
                         ";
            }
            ?>
        </table>
    </div>
    <h4>Results</h4>
    <div>
        <a class="btn btn-success" href="add-result.php">+ Add New Result</a>
    </div>
    <table class="table table-striped mt-3">
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Team 1</th>
            <th scope="col">Team 1 Score</th>
            <th scope="col">Team 2</th>
            <th scope="col">Team 2 Score</th>
            <th scope="col">Edit Result</th>
            <th scope="col">Delete Result</th>
        </tr>
        <?php
        foreach ($results as $result) {
            echo "
                            <tr>
                                <td scope='col'>" . $result['date'] . "</td>
                                <td scope='col'>" . $result['Team1Name'] . "</td>
                                <td scope='col'>" . $result['Team1Score'] . "</td>
                                <td scope='col'>" . $result['Team2Name'] . "</td>
                                <td scope='col'>" . $result['Team2Score'] . "</td>
                                <td scope='col'><form method='post' action='update-result.php'>
                            <input type='hidden' name='id' value='" . $result['id'] . "'>
                            <button type='submit' class='btn btn-sm btn-info' name='editResult'>Edit Result</button>
                        </form></td>
                        <td scope='col'><form method='get' action='includes/deleteResult.php'>
                            <input type='hidden' name='id' value='" . $result['id'] . "'>
                            <button type='submit' class='btn btn-sm btn-danger' name='deleteResult'>Delete Result</button>
                        </form></td>
                            </tr>
                        ";
        }

        ?>
    </table>

    <?php
    include("reusable/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>