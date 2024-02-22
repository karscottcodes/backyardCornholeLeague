<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backyard Cornhole League | Update Team Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php
    include("reusable/header.php");
    ?>
    <?php
    $id = $_POST['id'];
    $query = "SELECT * FROM teams WHERE `id` = '$id'";
    $result = mysqli_query($connect, $query);

    $editTeam = $result -> fetch_assoc(); //takes one row of data and turns into array
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Edit Team</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="includes/updateTeam.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $editTeam['id'] ?>">
                    <div class="form-group">
                        <label for="name">Team Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="<?php echo $editTeam['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="imgsrc">Image URL</label>
                        <input type="text" class="form-control" id="imgsrc" name="imgsrc" aria-describedby="imageHelp"
                        value="<?php echo $editTeam['imgsrc']?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="editTeam">Edit Team</button>
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