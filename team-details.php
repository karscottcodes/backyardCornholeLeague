<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backyard Cornhole League | Team Details </title>
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

                <h1>BCL | Team Details</h1>

                <?php

            if (isset($_GET['id'])) {
                // Sanitize the input to prevent SQL injection
                $teamID = mysqli_real_escape_string($connect, $_GET['id']);

                $queryTeams = "SELECT t.name AS TeamName, t.imgsrc, ls.TotalGames, ls.Wins, ls.Losses, ls.PointsScoredFor, ls.PointsScoredAgainst, ls.WinningPercentage
                              FROM Teams t
                              LEFT JOIN `leaguestandings` ls ON t.id = ls.id
                              WHERE t.id = '$teamID'";

                $queryTeamMembers = "SELECT p.fname, p.lname
                FROM Players p
                INNER JOIN PlayerTeams pt ON p.id = pt.PlayerID
                WHERE pt.TeamID = '$teamID'
                LIMIT 2"; // Limit to first two members

                $queryResults = "SELECT DISTINCT r.*, t1.name AS Team1Name, t2.name AS Team2Name
                FROM Results r
                INNER JOIN Teams t1 ON r.Team1ID = t1.id
                INNER JOIN Teams t2 ON r.Team2ID = t2.id
                WHERE t1.id = '$teamID' OR t2.id = '$teamID'
                ORDER BY r.date";


                // Execute the queries
                $resultTeams = mysqli_query($connect, $queryTeams);
                $resultTeamMembers = mysqli_query($connect, $queryTeamMembers);
                $resultResults = mysqli_query($connect, $queryResults);

                if (!$resultTeams || !$resultTeamMembers || !$resultResults) {
                    echo 'Error Message: ' . mysqli_error($connect) . '.';
                    exit;
                }

                // Check if Team exists
                if (mysqli_num_rows($resultTeams) > 0) {
                    // Fetch Team data
                    $team = mysqli_fetch_assoc($resultTeams);

                    // Display Team Information
                    echo '<div class="container"><div class="row">
                    <div class="col-sm-3">
                    <img src="' .$team['imgsrc']. '" style="max-width: 200px; height: auto;">
                    </div>
                    <div class="col-sm-9">
                    <h2>' . $team['TeamName'] . ' | Team Profile</h2></div></div>';
                    // Display team members
                    echo '<div class="row">
                    <div class="col-sm-5">
                    <h3>Team Members:</h3>
                    <ul>';

                    $count = 0;
                    while ($teamMember = mysqli_fetch_assoc($resultTeamMembers)) {
                        // Display only the first two team members
                        if ($count < 2) {
                            echo '<li>' . $teamMember['fname'] . ' ' .$teamMember['lname']. '</li>';
                            $count++;
                        } else {
                            break; // Exit the loop after displaying the first two team members
                        }
                    }

                    echo '</ul></div>
                    <div class="col-sm-7">
                    <h3>Team Details</h3>
                    <table class="table table-striped">
                    <tr>
                    <th scope="col">Games Played:</th>
                    <th scope="col">Wins:</th>
                    <th scope="col">Losses:</th>
                    <th scope="col">Win %</th>
                    <th scope="col">Points For:</th>
                    <th scope="col">Points Against:</th>
                    </tr>
                    <tr>
                        <td>'. $team['TotalGames'] .'</td>
                        <td>'. $team['Wins'] .'</td>
                        <td>'. $team['Losses'] .'</td>
                        <td>'. $team['WinningPercentage'] .'</td>
                        <td>'. $team['PointsScoredFor'] .'</td>
                        <td>'. $team['PointsScoredAgainst'] .'</td>
                      </tr>
                    </table></div></div>';



                } else {
                    // Team not found
                    echo '<p>Team not found.</p>';
                }
            } else {
                // Team Id parameter is missing
                echo '<p>Team ID is missing.</p>';
            }


            echo '<div class="container">
            <div class="row">
            <table class="table table-striped">
            <tr>
                <th scope="col">Result Date:</th>
                <th scope="col">Team 1:</th>
                <th scope="col">Score:</th>
                <th scope="col">Team 2:</th>
                <th scope="col">Score:</th>
                <th scope="col">Notes:</th>
            </tr>';

                while ($row = mysqli_fetch_assoc($resultResults)) {

                $spanStyle = $spanStyleS = $spanStyle2 = $spanStyle2S = "";

                if ($row['Team1Name'] === $team['TeamName'] && $row['Team1Score'] > $row['Team2Score']) {
                    $spanStyle = "font-weight: bold;";
                    $spanStyleS = "font-weight:bold; color: green;";
                } elseif ($row['Team1Name'] === $team['TeamName'] && $row['Team1Score'] < $row['Team2Score']) {
                    $spanStyle = "font-weight: bold;";
                    $spanStyleS = "font-weight: bold; color: red;";
                } else {
                    $spanStyle = "font-weight: normal;";
                    $spanStyleS = "color: #000;";
                }
    
                if ($row['Team2Name'] === $team['TeamName'] && $row['Team2Score'] > $row['Team1Score']) {
                    $spanStyle2 = "font-weight: bold;";
                    $spanStyle2S = "font-weight: bold; color: green;";
                } elseif ($row['Team2Name'] === $team['TeamName'] && $row['Team2Score'] < $row['Team1Score']) {
                    $spanStyle2 = "font-weight: bold;";
                    $spanStyle2S = "font-weight: bold; color: red;";
                } else {
                    $spanStyle2 = "font-weight: normal;";
                    $spanStyle2S = "color: #000;";
                }
                
                echo '<tr>
                    <td>' . $row['date'] . '</td>
                    <td><span style="' . $spanStyle . '">' . $row['Team1Name'] . '</span></td>
                    <td><span style="' . $spanStyleS . '">' . $row['Team1Score'] . '</span></td>
                    <td><span style="' . $spanStyle2 . '">' . $row['Team2Name'] . '</span></td>
                    <td><span style="' . $spanStyle2S . '">' . $row['Team2Score'] . '</span></td>
                    <td>' . $row['notes'] . '</td>
                </tr>';
            }

            echo '</table>
        </div>
        </div>';
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