<?php
    if(isset($_POST['editResult'])){ //isset checks if something exists
        $id = $_POST['id'];
        $date = $_POST['fname'];
        $notes = $_POST['lname'];
        $team1id = $_POST['Team1Id'];
        $team2score = $_POST['Team1Score'];
        $team2id = $_POST['Team2Id'];
        $team2score = $_POST['Team2Score'];
    
        include('connect.php');
    
        $query = "UPDATE Results SET (`date` = '$date', notes = '$notes', Team1Id = '$team1id', Team1Score = '$team1score', Team2Id = '$team2id', Team2Score = '$team2score');";
        
        $editResult = mysqli_query($connect, $query);
    
        if($editResult){
            echo "Success";
        } else {
            echo "Fail" . mysqli_error($connect);
        }

    } else {
        echo "You should not be here!";
    }