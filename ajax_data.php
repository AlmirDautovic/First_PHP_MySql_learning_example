<?php

include('config/db_connection.php');

$sql = "SELECT * FROM users LIMIT 5";

$result = mysqli_query($conn, $sql);

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($users);

mysqli_free_result($result);

mysqli_close($conn);
