<?php
    if(isset($_POST['addResult'])){

        // Get form data
        $notes = $_POST['notes'];
        $team1id = $_POST['team1id'];
        $team1score = $_POST['team1score'];
        $team2id = $_POST['team2id'];
        $team2score = $_POST['team2score'];

        include('connect.php');

        $newResult = "INSERT INTO Results (notes, Team1Id, Team1Score, Team2Id, Team2Score) 
        VALUES ('$notes', '$team1id', '$team1score', '$team2id', '$team2score')";

        $result = mysqli_query($connect, $newResult);

        if ($result){
            echo "Success";
        } else {
            echo "Fail" . mysqli_error($connect);
        }
    } else {
        echo "You should not be here.";
    }