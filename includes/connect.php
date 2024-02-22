<?php
    $host_name = 'db5015398367.hosting-data.io';
    $user_name = 'dbu5570895';
    $password = 'J@broni2024';
    $database = 'dbs12613014';

    $connect = mysqli_connect(
    $host_name,
    $user_name,
    $password,
    $database
);

    if (!$connect){
        die("Connection Failed:" . mysqli_connect_error());
    }