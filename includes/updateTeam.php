<?php
    if(isset($_POST['editTeam'])){ //isset checks if something exists
        $id = $_POST['id'];
        $name = $_POST['name']; 
        $imgsrc = $_POST['imgsrc'];
    
        include('connect.php');
    
        $query = "UPDATE teams SET `name` = '$name', `imgsrc` = '$imgsrc' WHERE `id` = '$id';";
        
        $editTeam = mysqli_query($connect, $query);
    
        if($editTeam){
            echo "Success";
        } else {
            echo "Fail" . mysqli_error($connect);
        }

    } else {
        echo "You should not be here!";
    }