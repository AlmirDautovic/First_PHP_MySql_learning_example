<?php
$conn = mysqli_connect('localhost', 'almir', 'almir', 'php example');

if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}


?>


<!DOCTYPE html>
<html lang="en">

<?php include('header.php'); ?>

<h4 class="center grey-text">USERS!</h4>

<div class="container">
    <div class="row">

        <div class="col s6 m6">
            <div class="card grey lighten-4 grey-text">
                <div class="card-content center ">
                    <span class="card-title ">Card Title</span>
                    <p>I am a very simple card. I am good at containing small bits of information.
                        I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>

    </div>
</div>
</body>

</html>