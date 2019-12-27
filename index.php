<?php

require('config/db.php');

$query = 'SELECT * FROM post ORDER BY created_at DESC';

$result = mysqli_query($conn, $query);
$posts= mysqli_fetch_all($result, MYSQLI_ASSOC);


?>

<?php include('inc/header.php'); ?>
	<div class="container">
		<h1>Posts</h1>

		<?php foreach ($posts as $post) : ?>
			<div class="alert alert-dismissible alert-secondary">
				<h3> <?php echo $post['title'];?></h3>
				<small>Created On <?php echo $post['created_at'];?> By <?php echo $post['author'];?> </small>
				<p><?php echo $post['body'];?></p>
				<a class="btn btn-default" href="post.php?id=<?php echo $post['id']; ?>">Read More</a>
			</div>

		<?php endforeach; ?>

</div>

	