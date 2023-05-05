<?php

$conn = mysqli_connect('localhost', 'almir', 'almir', 'php example');

if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}

$name = $email = $age = $message = '';
$errors = array('name' => '', 'email' => '', 'age' => '', 'message' => '');

if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $errors['name'] = 'A name is required ' . '<br>';
    } else {
        $name = $_POST['name'];
    }

    if (empty($_POST['email'])) {
        $errors['email'] = 'An email is required ' . '<br>';
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST['age'])) {
        $errors['age'] = 'Age input is required ' . '<br>';
    } else {
        $age = $_POST['age'];
    }

    if (empty($_POST['message'])) {
        $errors['message'] = 'Message is required' . '<br>';
    } else {
        $message = $_POST['message'];
    }

    if (array_filter(($errors))) {
    } else {
        $name = mysqli_real_escape_string($conn, $POST['name']);
        $email = mysqli_real_escape_string($conn, $POST['email']);
        $age = mysqli_real_escape_string($conn, $POST['age']);
        $message = mysqli_real_escape_string($conn, $POST['message']);

        $sql = "INSERT INTO users(name, email, age, message) VALUES ('$name', '$email', '$age', '$message')";

        if (mysqli_query($conn, $sql)) {
            header('Location: users.php');
        } else {
            echo 'querry error: ' . mysqli_error($conn);
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body class="grey lighten-4">
    <section class="container grey-text">
        <h4 class="center">Enter Your Information!</h4>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="white" method="POST">
            <label for="name">User Name:</label>
            <input type="text" name="name">
            <div class="red-text"><?php echo $errors['name']; ?></div>
            <label for="email">Your Email:</label>
            <input type="email" name="email">
            <div class="red-text"><?php echo $errors['email']; ?></div>
            <label for="age">Your Age:</label>
            <input type="number" name="age">
            <div class="red-text"><?php echo $errors['age']; ?></div>
            <label for="message">Your Message:</label>
            <input type="text" name="message">
            <div class="red-text"><?php echo $errors['message']; ?></div>
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn z-depth-0">
            </div>
        </form>
    </section>
</body>

</html>