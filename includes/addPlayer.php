<?php
    if(isset($_POST['addPlayer'])){

        // Get form data
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $playerdob = $_POST['playerdob'];
        $imgsrc = $_POST['imgsrc'];

        include('connect.php');

        $newPlayer = "INSERT INTO Players (fname, lname, playerdob, imgsrc) 
        VALUES ('$fname', '$lname', '$playerdob', '$imgsrc')";

        $player = mysqli_query($connect, $newPlayer);

        if ($player){
            echo "Success";
        } else {
            echo "Fail" . mysqli_error($connect);
        }
    } else {
        echo "You should not be here.";
    }