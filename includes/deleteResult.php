<?php
    if(isset($_GET['deleteResult'])){
        $id = $_GET['id'];

        include('connect.php');

        $query = "DELETE FROM results WHERE id = '$id'";

        $delete = mysqli_query($connect, $query);

        if ($delete) {
            echo "Success";
        } else {
            echo "Fail" . mysqli_error($connect);
        }
    } else {
        echo "You should not be here.";
    }