<?php
	require('config/db.php');
	session_start();
	

	//check for submit
	if(isset($_POST['submit'])){
		//get form data
		$title = mysqli_real_escape_string($db, $_POST['title']);
		$author = $_SESSION['username'];
		$body = mysqli_real_escape_string($db, $_POST['body']);

		$query = "INSERT INTO posts (post_title, post_author, post_body) VALUES('$title', '$author', '$body')";

		if(mysqli_query($db, $query)){
			echo "<script>
              alert('You Added a post.');
              window.location.href='http://localhost/kirablogspot/landing-page.php';
              </script>";
		}
		else{
			echo "ERROR: " . mysqli_error($db);
		}
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

  <i class="fab fa-drupal"></i><a class="navbar-brand" href="landing-page.php">Kira Blog Spot</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="landing-page.php">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>

      <a href="" class="btn btn-sm">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></a>
	      <a href="logout.php" class="btn btn-primary btn-sm">Logout</a>

      </div>
    </div>
  </nav>

		<div class="container">
			<a class="btn btn-success btn-sm" href="<?php echo ROOT_URL; ?>landing-page.php">Back</a>
			<h1>Add Post</h1>
			<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
				<div class="form-group">
					<label>Post Title</label>
					<input type="text" name="title" class="form-control">
				</div>
				<div class="form-group">
					<label>Post Body</label>
					<textarea name="body" class="form-control"></textarea>
				</div>
				<input type="submit" name="submit" value="Submit" class="btn btn-secondary">
			</form>
		</div>
	<?php include('inc/footer.php'); ?>