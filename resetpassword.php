<?php
//// Initialize the session
//session_start();
//
//// Check if the user is logged in, if not then redirect to login page
//if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//    header("location: login.php");
//    exit;
//}

// Include config file
require_once "dbconfig.php";
$successMSG = "";
$errorMSG = "";
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
$link = $mysqli;

// Print Session
//print_r($_SESSION);
//echo "<br><br>";
// Get Session User ID
$uid = $_SESSION["id"];
// Create the MYSQLi Query
mysqli_query($link,"SELECT * FROM users WHERE id=".$uid);
// Var's and Data from Query.
$query = "SELECT * FROM users WHERE id=".$uid;
$result = $link->query($query);
$row = $result->fetch_array(MYSQLI_BOTH);

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = '
                    <br>
                    <div class="alert alert-warning" role="alert">
                        Please confirm the password.
                    </div>
                ';
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = '
                    <br>
                    <div class="alert alert-warning" role="alert">
                        Password did not match.
                    </div>
                ';
        }
    }

    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                //session_destroy();
                //header("location: login.php");
                //exit();
                $successMSG = '
                    <div class="alert alert-secondary" role="alert" style="margin-top: 40px;">
                        Password was changed successfully.
                    </div>
                ';
            } else{
                $errorMSG = '
                    <div class="alert alert-danger" role="alert" style="margin-top: 40px;">
                        Oops! Something went wrong. Please try again later.
                    </div>
                ';
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once ('inc/head.php');
    ?>
</head>
<body>
<div class="container" style="margin-top: 40px;">
    <div class="row">

        <div class="col">

            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="https://www.fotkaplus.co.uk/wp-content/uploads/2018/09/Profile-poster-2.jpg" alt="Image of User" style="height: auto; width: 100%;">
                        </div>
                        <div class="col-8">
                            <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $row["title"]; ?></h6>
                            <p class="card-text"><?php echo $row["email"]; ?> <br><?php echo $row["phone"]; ?></p>
                            <a href="#" class="card-link">Profil bearbeiten</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col card">
            <?php echo $successMSG; ?>
            <h2>Passwort zurücksetzen</h2>
            <p>Bitte füllen Sie dieses Formular aus, um Ihr Passwort zurückzusetzen.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                    <label>Neues Kennwort</label>
                    <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                    <span class="help-block"><?php echo $new_password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Passwort bestätigen</label>
                    <input type="password" name="confirm_password" class="form-control">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>

    </div>
</div>
</body>
</html>