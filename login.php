<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}

// Include config file
require_once "dbconfig.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
$link = $mysqli;

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            $myid = $_SESSION["id"];

                            // Redirect user to welcome page
                            header("location: dashboard.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
<?php
    include_once ('inc/head.php');
?>
<body>


<section class="fdb-block" style="background-image: url(assets/imgs/houses/brian-babb-256298-unsplash.jpg);height: auto;min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 col-xl-5 text-center">
                <div class="fdb-box">
                    <div class="row">
                        <div class="col">
                            <h1>Log In</h1>
                            <p>Please fill in your credentials to login.</p>
                        </div>
                    </div>
                    <div class="row">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="width: 100%;">
                            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>" style="text-align: left;">
                                <label style="color: #999;">Username</label>
                                <input type="text" name="username" class="form-control mb-1" value="<?php echo $username; ?>">
                                <span class="help-block"><?php echo $username_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" style="text-align: left;">
                                <label style="color: #999;">Password</label>
                                <input type="password" name="password" class="form-control mb-1">
                                <span class="help-block"><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary" value="Login" style="width: 100%;">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


</body>
</html>