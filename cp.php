<?php

    require_once ('process.php');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Royal Estate - Home</title>

    <link rel="stylesheet" href="assets/css/master.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>
<?php include_once ('inc/navbar.php'); ?>

<a class="waves-effect waves-light btn modal-trigger" href="#createUser">Create User - Modal</a>
<!-- Modal Structure -->
<div id="createUser" class="modal">
    <div class="modal-content">
        <?php include_once('inc/createUser.php'); ?>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>

<?php include_once ('inc/footer.php'); ?>

</body>
</html>

