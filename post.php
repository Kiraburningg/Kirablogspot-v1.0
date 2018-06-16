<?php
	require('config/db.php');

	session_start();
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;

  }
	//check for submit
	if(isset($_POST['delete'])){
		//get form data
		$delete_id = mysqli_real_escape_string($db, $_POST['delete_id']);

		$query = "DELETE FROM posts WHERE post_id = {$delete_id}";

		if(mysqli_query($db, $query)){
			echo "<script>
              alert('You deleted the post.');
              window.location.href='http://localhost/kirablogspot/landing-page.php';
              </script>";
		}
		else{
			echo "ERROR: " . mysqli_error($db);
		}
	}

	//get id
	$id = mysqli_real_escape_string($db, $_GET['id']);

	//create query
	$query = 'SELECT * FROM posts WHERE post_id = ' .$id;

	//get result
	$result = mysqli_query($db, $query);

	//Fetch Data
	$post = mysqli_fetch_assoc($result);

	// Free Result
	mysqli_free_result($result);

	//close connection
	mysqli_close($db);
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
			<a href="<?php echo ROOT_URL . 'landing-page.php'; ?>" class="btn btn-success btn-sm">Back</a>
			<h2><?php echo $post['post_title']; ?></h2>
			<small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['post_author']; ?></small>
			<p><?php echo $post['post_body']; ?></p>
			<hr>
			<a class="btn btn-secondary" href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['post_id']; ?>">Edit Post</a>
			<form class="float-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="hidden" name="delete_id" value="<?php echo $post['post_id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn btn-secondary">
			</form>

		</div>
	<?php include('inc/footer.php'); ?>