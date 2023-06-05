<?php
$name = $email = $age = $message =  '';
include('config/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    for ($i = 0; $i < 5; $i++) {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $name = substr(md5(microtime()), rand(0, 26), 5);
        $email = substr(md5(microtime()), rand(0, 26), 5) . "@gmail.com";
        $age = rand(18, 100);
        $message = substr(str_shuffle($characters), 0, 15);
        // $data = [$name, $email, $age, $message];
        $sql = "INSERT INTO users2(name, email, age, message) VALUES ('$name', '$email', '$age', '$message')";
        // echo json_encode($data);
    }

    $sql1 = "SELECT * FROM users2 LIMIT 5";
    $result = mysqli_query($conn, $sql1);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($users);
    mysqli_free_result($result);
    mysqli_close($conn);
}



// $sql = "SELECT * FROM users LIMIT 5";

// $result = mysqli_query($conn, $sql);

// $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

// echo json_encode($users);

// mysqli_free_result($result);

// mysqli_close($conn);
