<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;

  }

require('config/db.php');

  //query
  $query = 'SELECT * FROM posts ORDER BY created_at DESC';

  //get result
  $result = mysqli_query($db, $query);

  //put the result in a variable in associative array
  while($post = $result -> fetch_array()){
    $posts[] = $post;
  }

  //free the result
  mysqli_free_result($result);

  // close connection
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
        <li class="nav-item">
          <a class="nav-link" href="landing-page.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="<?php echo ROOT_URL; ?>addpost.php">Add post</a>
       </li>
      </ul>

      <a href="" class="btn btn-sm">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></a>
	      <a href="logout.php" class="btn btn-primary btn-sm">Logout</a>

      </div>
    </div>
  </nav>

  <div class="container">
      <h1 class="text-center text-muted"><em>Posts</em></h1>
      <?php foreach($posts as $post) : ?>
        <div class="jumbotron">
          <h3><?php echo $post['post_title']; ?></h3>
          <small>Created on <?php echo $post['created_at']; ?> by: <strong><?php echo $post['post_author']; ?></strong></small>
          <p><?php echo $post['post_body']; ?></p>
          <a href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['post_id']; ?>" class="btn btn-success btn-sm">Read More</a>
        </div>
      <?php endforeach; ?>
  </div>

  <?php include('inc/footer.php'); ?>