<?php
    // Initialize the session
    session_start();

    include_once ('dbconfig.php');

    // Create User on CP.php
    if (isset($_POST['createUser'])){
        $username = $_POST['username'];
        $name = $_POST['name'];
        $location = $_POST['location'];

        $mysqli->query("INSERT INTO users (username, name, location) VALUES('$username','$name', '$location')") or die($mysqli->error);
    }

?>