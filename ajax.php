<?php

include('config/db_connection.php');




?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col s3">
            <a class="waves-effect blue-grey darken-1 waves-light btn center" id="generateBtn" value=1 style="margin-top: 30px;" onclick="displayUsers(this)">
                Generate Users</a>
        </div>

        <div class="col s9" style="margin-top: 30px;">
            <div id="display">

            </div>
        </div>
    </div>
</div>

</body>

<script src="index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>

</html>