<?php
	require('config/db.php');

	
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

	<?php include('inc/header.php'); ?>
		<div class="container">
			<a href="<?php echo ROOT_URL; ?>" class="btn btn-success btn-sm">Back</a>
			<h2><?php echo $post['post_title']; ?></h2>
			<small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['post_author']; ?></small>
			<p><?php echo $post['post_body']; ?></p>
			<hr>

		</div>
	<?php include('inc/footer.php'); ?>