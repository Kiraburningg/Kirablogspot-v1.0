<?php
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

<?php include('inc/header.php'); ?>
	<div class="container">
			<h1 class="text-center text-muted"><em>Posts</em></h1>
			<?php foreach($posts as $post) : ?>
        		<div class="jumbotron">
		          <h3><?php echo $post['post_title']; ?></h3>
		          <small>Created on <?php echo $post['created_at']; ?> by: <strong><?php echo $post['post_author']; ?></strong></small>
		          <p><?php echo $post['post_body']; ?></p>
		          <a href="<?php echo ROOT_URL; ?>post2.php?id=<?php echo $post['post_id']; ?>" class="btn btn-success btn-sm">Read More</a>
       			 </div>
    	  <?php endforeach; ?>
	</div>




<?php include('inc/footer.php'); ?>