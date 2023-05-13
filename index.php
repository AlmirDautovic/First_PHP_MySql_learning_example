<?php

include('config/db_connection.php');

$name = $email = $age = $message = $country = $city = $zipcode = $street = '';
$errors = array(
    'name' => '', 'email' => '', 'age' => '', 'message' => '',
    'country' => '', 'city' => '', 'zipcode' => '', 'street' => ''
);

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

    if (!array_filter(($errors))) {

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

<?php include('header.php'); ?>


<section class="container grey-text">
    <h4 class="center">Enter Your Information!</h4>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="white" method="POST">
        <label for="name">User Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
        <div class="red-text"><?php echo $errors['name']; ?></div>
        <label for="email">Your Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>
        <label for="age">Your Age:</label>
        <input type="number" name="age" value="<?php echo htmlspecialchars($age); ?>">
        <div class="red-text"><?php echo $errors['age']; ?></div>
        <label for="message">Your Message:</label>
        <input type="text" name="message" value="<?php echo htmlspecialchars($message); ?>">
        <div class="red-text"><?php echo $errors['message']; ?></div>
        <label for="country">Country:</label>
        <input type="text" name="country" value="<?php echo htmlspecialchars($country); ?>">
        <div class="red-text"><?php echo $errors['country']; ?></div>
        <label for="city">City:</label>
        <input type="text" name="city" value="<?php echo htmlspecialchars($city); ?>">
        <div class="red-text"><?php echo $errors['city']; ?></div>
        <label for="zipcode">Zipcode:</label>
        <input type="number" name="zipcode" value="<?php echo htmlspecialchars($zipcode); ?>">
        <div class="red-text"><?php echo $errors['zipcode']; ?></div>
        <label for="street">Street:</label>
        <input type="text" name="street" value="<?php echo htmlspecialchars($street); ?>">
        <div class="red-text"><?php echo $errors['street']; ?></div>
        <div class="center">
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn z-depth-0">
            </div>
    </form>
</section>
</body>

</html>