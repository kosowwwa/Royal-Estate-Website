<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>

<!doctype html>
<html lang="en">
<?php
include_once ('inc/head.php');
?>
<body>

<?php
    include_once ('inc/navbar.php');
?>

<div class="container" style="margin-bottom: 80px;margin-top: 80px;">

    <?php

        include_once ('resetpassword.php');

    ?>

</div>
<?php
include_once ('inc/footer.php');
?>
</body>
</html>