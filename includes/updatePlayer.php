<?php
    if(isset($_POST['editPlayer'])){ //isset checks if something exists
        $id = $_POST['id'];
        $fname = $_POST['fname']; 
        $lname = $_POST['lname'];
        $playerdob = $_POST['playerdob'];
        $imgsrc = $_POST['imgsrc'];
    
        include('connect.php');
    
        $query = "UPDATE players SET `fname` = '$fname', `lname` = '$lname', `playerdob` = '$playerdob', `imgsrc` = '$imgsrc' WHERE `id` = '$id';";
        
        $editPlayer = mysqli_query($connect, $query);
    
        if($editPlayer){
            echo "Success";
        } else {
            echo "Fail" . mysqli_error($connect);
        }

    } else {
        echo "You should not be here!";
    }