<?php
	require('config/db.php');
	session_start();
	
	//check for submit
	if(isset($_POST['submit'])){
		//get form data
		$update_id = mysqli_real_escape_string($db, $_POST['update_id']);
		$title = mysqli_real_escape_string($db, $_POST['title']);
		$body = mysqli_real_escape_string($db, $_POST['body']);

		$query = "UPDATE posts SET
					post_title = '$title',
					post_body = '$body'
					WHERE post_id = {$update_id}";

		if(mysqli_query($db, $query)){
			echo "<script>
              alert('Post Edited.');
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
	$query = 'SELECT * FROM posts WHERE post_id = ' . $id;

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
			<a class="btn btn-success btn-sm" href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['post_id']; ?>">Back</a>
			<h1>Edit Post</h1>
			<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
				<div class="form-group">
					<label>Title</label>
					<input type="text" name="title" class="form-control" value="<?php echo $post['post_title']; ?>">
				</div>
	
				<div class="form-group">
					<label>Post body</label>
					<textarea name="body" class="form-control"><?php echo $post['post_body']; ?></textarea>
				</div>

				<input type="hidden" name="update_id" value="<?php echo $post['post_id']; ?>">
				<input type="submit" name="submit" value="Submit" class="btn btn-">
			</form>
		</div>
	<?php include('inc/footer.php'); ?>