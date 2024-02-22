<?php
    if(isset($_POST['addTeam'])){

        // Get form data
        $name = $_POST['name'];
        $imgsrc = $_POST['imgsrc'];

        include('connect.php');

        $newTeam = "INSERT INTO Teams (`name`, imgsrc) 
        VALUES ('$name', '$imgsrc')";

        $team = mysqli_query($connect, $newTeam);

        if ($team){
            echo "Success";
        } else {
            echo "Fail" . mysqli_error($connect);
        }
    } else {
        echo "You should not be here.";
    }