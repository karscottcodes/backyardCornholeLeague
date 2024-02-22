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

                <h1>BCL | Result Sheet</h1>

                <?php
                //Build Query
                $query = "SELECT r.*, t1.name AS Team1Name, t2.name AS Team2Name
                FROM Results r 
                INNER JOIN Teams t1 ON r.Team1Id = t1.id
                INNER JOIN Teams t2 ON r.Team2Id = t2.id
                ORDER BY r.date;";

                $results = mysqli_query($connect, $query);

                if (!$results) {
                    echo "Error Message: " . mysqli_error($connect) . ".";
                    exit;
                }

                echo "<p>The query found: " . mysqli_num_rows($results) . " results.</p><br>";
                ?>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
            <table class="table table-striped">
                <tr>
                    <th scope="col">Result Date:</th>
                    <th scope="col">Team 1:</th>
                    <th scope="col">Score:</th>
                    <th scope="col">Team 2:</th>
                    <th scope="col">Score:</th>
                    <th scope="col">Notes:</th>
                </tr>
                    
            <?php
            
            // Loop Through Result Records
            foreach ($results as $result){

                echo '<tr>
                        <td>'. $result['date'] .'</td>
                        <td>'. $result['Team1Name'] .'</td>
                        <td>'. $result['Team1Score'] .'</td>
                        <td>'. $result['Team2Name'] .'</td>
                        <td>'. $result['Team2Score'] .'</td>
                        <td>'. $result['notes'] .'</td>
                      </tr>';

            } 
            ?>
            </table>

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