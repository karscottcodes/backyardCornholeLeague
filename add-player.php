<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backyard Cornhole League | Add New Player</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php
    include("reusable/header.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Add New Player</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="includes/addPlayer.php" method="post">
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" aria-describedby="firstNameHelp"
                            placeholder="Enter First Name">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" aria-describedby="lastNameHelp"
                            placeholder="Enter Last Name">
                    </div>
                    <div class="form-group">
                        <label for="playerdob">Birthday</label>
                        <input type="date" class="form-control" id="playerdob" name="playerdob"
                            aria-describedby="playerdobHelp">
                    </div>
                    <div class="form-group">
                        <label for="imgsrc">Image URL</label>
                        <input type="text" class="form-control" id="imgsrc" name="imgsrc" aria-describedby="imageHelp"
                            placeholder="Enter Image URL">
                    </div>
                    <button type="submit" class="btn btn-primary" name="addPlayer">Add New Player</button>
                </form>
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