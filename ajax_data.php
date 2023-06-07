<?php
include('config/db_connection.php');
$name = $email = $age = $message =  '';
$limit = 5;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    for ($i = 0; $i < $limit; $i++) {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $name = substr(md5(microtime()), rand(0, 26), 5);
        $email = substr(md5(microtime()), rand(0, 26), 5) . "@gmail.com";
        $age = rand(18, 100);
        $message = substr(str_shuffle($characters), 0, 15);

        $sql = "INSERT INTO users(name, email, age, message) VALUES ('$name', '$email', '$age', '$message')";
        if (mysqli_query($conn, $sql) !== true) {
            echo 'querry error: ' . mysqli_error($conn);
        }
    }

    // $sql1 = "SELECT * FROM users ORDER BY id DESC LIMIT $limit";
    $sql1 = "SELECT * FROM(SELECT * FROM users ORDER BY id DESC LIMIT 5) AS sub ORDER BY id ASC";
    $result = mysqli_query($conn, $sql1);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($users);
    mysqli_free_result($result);
    mysqli_close($conn);
}
