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

                <h1>BCL | Team Roster</h1>

                <?php
                //Build Query
                $query = "SELECT * FROM Teams ORDER BY `name`";

                $teams = mysqli_query($connect, $query);

                if (!$teams) {
                    echo "Error Message: " . mysqli_error($connect) . ".";
                    exit;
                }

                echo "<p>The query found: " . mysqli_num_rows($teams) . " results.</p><br>";
                ?>
            </div>
        </div>
        <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php
                    //Loop Through Player Records
                    foreach ($teams as $team) {
                        echo "
                        <div class='col'>
                            <div class='card h-100'>
                                <img src=" . $team['imgsrc'] . " class='card-img-top' alt='" . $team['name'] . " Team Logo'>
                                <div class='card-body'>
                                    <h5 class='card-title'>" . $team['name'] . "</h5>
                                </div>
                                <div class='card-footer text-body-secondary text-center'>
                                    <form>
                                        <input type='hidden' value='".$team['id']."'>
                                        <a class='btn btn-outline-primary' href='team-details.php?id=".$team['id']."'>Team Details</a>
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