<?php

$conn = mysqli_connect('localhost', 'almir', 'almir', 'php example');

if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}
