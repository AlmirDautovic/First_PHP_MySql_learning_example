<?php

$conn = mysqli_connect('localhost', 'almir', 'almir', 'php example');

if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}

$name = $email = $age = $message = '';
$errors = array('name' => '', 'email' => '', 'age' => '', 'message' => '');

if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $errors['name'] = 'A name is required ' + '<br>';
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
            <label for="email">Your Email:</label>
            <input type="email" name="email">
            <label for="age">Your Age:</label>
            <input type="number" name="age">
            <label for="message">Your Message:</label>
            <input type="text" name="message">
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn z-depth-0">
            </div>
        </form>
    </section>
</body>

</html>