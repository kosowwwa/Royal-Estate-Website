<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

//print_r($_SESSION);
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

    <section class="fdb-block">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 col-sm-6 col-md-3" style="border-right: 1px solid rgba(153, 153, 153, 0.25098039215686274);">
                    <img alt="image" class="fdb-icon" src="assets/imgs/icons/lender.svg">
                    <h3><strong>Einen neuen Benutzer hinzufügen</strong></h3>
                    <p class="mt-3"><a class="btn btn-primary" href="#">Erstellen</a></p>
                </div>

                <div class="col-12 col-sm-6 col-md-3 pt-5 pt-sm-0" style="border-right: 1px solid rgba(153, 153, 153, 0.25098039215686274);">
                    <img alt="image" class="fdb-icon" src="assets/imgs/icons/checklist.svg">
                    <h3><strong>Angebote Erstellen <br><br></strong></h3>
                    <p class="mt-3"><a class="btn btn-primary" href="#">Erstellen</a></p>
                </div>

                <div class="col-12 col-sm-6 col-md-3 pt-5 pt-md-0" style="border-right: 1px solid rgba(153, 153, 153, 0.25098039215686274);">
                    <img alt="image" class="fdb-icon" src="assets/imgs/icons/contract.svg">
                    <h3><strong>Dokumentation erstellen/ändern</strong></h3>
                    <p class="mt-3"><a class="btn btn-primary" href="#">Erstellen</a></p>
                </div>

                <div class="col-12 col-sm-6 col-md-3 pt-5 pt-md-0">
                    <img alt="image" class="fdb-icon" src="assets/imgs/icons/house-repair.svg">
                    <h3><strong>Website-Einstellungen <br><br></strong></h3>
                    <p class="mt-3"><a class="btn btn-primary" href="#">Einstellungen</a></p>
                </div>
            </div>
        </div>
    </section>

    <?php
        include_once ('inc/footer.php');
    ?>
</body>
</html>