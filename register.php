<?php
  // Include config file
  require('config/db.php');
  
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT user_id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } 

            else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
              echo "<script>
              alert('You have successfully created an account.');
              window.location.href='http://localhost/kirablogspot/';
              </script>";
                
            } else{
                echo "Something went wrong. Please try again later.";
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
          <a class="nav-link" href="<?php echo ROOT_URL; ?>">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>

      </div>
    </div>
  </nav>

  
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="imgcontainer">
      <i class="fa fa-user fx-10"></i>
    </div>

    <div class="container">
      <h1 class="logincss">Please Fill-out the sign-up form</h1>

      <div class="form-group">
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" value="<?php echo $username; ?>" required>
        <span class="help-block"><?php echo $username_err; ?></span>
      </div>

       <div class="form-group">
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" value="<?php echo $password; ?>" required>
        <span><?php echo $password_err; ?></span>
      </div>

      <div class="form-group">
        <label for="confirm_password"><b>Confirm Password</b></label>
        <input type="password" placeholder="Enter Password" name="confirm_password" value="<?php echo $confirm_password; ?>" required>
        <span><?php echo $confirm_password_err; ?></span>
     </div>
        
      <button type="submit" class="btn btn-success loginbtn">Register</button>
    </div>

    <div class="container">
      <a href="index.php" class="btn btn-danger cancelbtnreg">Cancel</a>
      <span class="psw2">Already have an account? <a href="login.php">Login here.</a></span>
    </div>
  </form>
</div>


<?php include('inc/footer.php'); ?>