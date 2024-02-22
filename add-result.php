<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backyard Cornhole League | Add New Result</title>
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
                <h1>Add New Result</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="includes/addResult.php" method="post">
                    <div class="form-group">
                        <label for="notes">Result Notes</label>
                        <input type="text" class="form-control" id="notes" name="notes" aria-describedby="notesHelp"
                            placeholder="Enter Notes">
                    </div>
                    <div class="form-group">
                        <label for="team1id">Team 1</label>
                        <select class="form-control" id="team1id" name="team1id" aria-describedby="team1idHelp">
                            <?php
                            //Build Query
                            $query = "SELECT id, `name` FROM Teams ORDER BY `id`";

                            $teams = mysqli_query($connect, $query);

                            if ($teams && mysqli_num_rows($teams) > 0) {
                                while ($option = mysqli_fetch_assoc($teams)) {
                                    echo "<option value='".$option['id']."'>".$option['name']."</option>
                                    ";
                                } 
                             } else {
                                    echo "<option value=''>No teams found.</option>";
                                }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="team1score">Team 1 Score</label>
                        <input type="number" max="21" class="form-control" id="team1score" name="team1score"
                            aria-describedby="team1scoreHelp" placeholder="Enter team1score">
                    </div>
                    <div class="form-group">
                        <label for="team2id">Team 2</label>
                        <select class="form-control" id="team2id" name="team2id" aria-describedby="team2idHelp">
                        <?php
                            mysqli_data_seek($teams, 0); //reset results counter

                            if ($teams && mysqli_num_rows($teams) > 0) {
                                while ($option = mysqli_fetch_assoc($teams)) {
                                    echo "<option value='".$option['id']."'>".$option['name']."</option>
                                    ";
                                } 
                             } else {
                                    echo "<option value=''>No teams found.</option>";
                                }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="team2score">Team 2 Score</label>
                        <input type="number" max="21" class="form-control" id="team2score" name="team2score"
                            aria-describedby="team2scoreHelp" placeholder="Enter team2score">
                    </div>

                    <button type="submit" class="btn btn-primary" name="addResult">Add New Result</button>
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