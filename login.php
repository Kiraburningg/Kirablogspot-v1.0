<?php
// Include config file
require('config/db.php');
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(trim($_POST["username"]) == false){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($db, $sql)){
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
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['username'] = $username;      
                            header("location: landing-page.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($db);
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Kira Blog Spot</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="css/fontawesome-all.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

  <div class="container">

  <i class="fab fa-drupal"></i><a class="navbar-brand" href="index.php">Kira Blog Spot</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo ROOT_URL ?>">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>

      </div>
    </div>
  </nav>
  
  <form class="form-control-lg" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <div class="imgcontainer">
      <i class="fa fa-user fx-10"></i>
    </div>

    <div class="container">
      <h1 class="logincss">Login</h1>

      <div class="form-group">
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" value="<?php echo $username; ?>" required>
      <span><?php echo $username_err; ?></span>
      </div>

      <div class="form-group">
      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
      <span><?php echo $password_err; ?></span>
      </div>
        
      <button type="submit" class="btn btn-success loginbtn">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container">
      <a href="index.php" class="btn btn-danger cancelbtn">Cancel</a>
      <span class="psw2">Sign-up for an <a href="register.php">account?</a></span>
    </div>
  </form>
</div>

<?php include('inc/footer.php'); ?>