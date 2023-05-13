<?php

include('config/db_connection.php');

$sql = "SELECT * FROM users JOIN address ON users.id = address.userId";

$result = mysqli_query($conn, $sql);

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">

<?php include('header.php'); ?>

<h4 class="center grey-text">USERS!</h4>

<div class="container">
    <div class="row">
        <?php foreach ($users as $user) : ?>
            <div class="col s6 m6">
                <div class="card grey lighten-4 grey-text">
                    <div class="card-content center ">
                        <span class="card-title black-text">
                            <h5>NAME : <?php echo htmlspecialchars($user['name']); ?></h5>
                        </span>
                        <p>From : <?php echo htmlspecialchars($user['street']); ?> ,
                            <?php echo htmlspecialchars($user['zipcode']); ?>
                            <?php echo htmlspecialchars($user['city']); ?>
                        </p>
                        <p><?php echo htmlspecialchars($user['country']); ?></p>
                        <p>Created by : <?php echo htmlspecialchars($user['email']); ?>,
                            on <?php echo htmlspecialchars($user['created_at']); ?>
                        </p>
                        <p>Creator Message : <?php echo htmlspecialchars($user['message']); ?></p>
                    </div>
                    <div class="card-action">
                        <a href="#">More Details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>

</html>