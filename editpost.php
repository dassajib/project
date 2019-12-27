<?php

require('config/db.php');
require('config/config.php');

if(isset($_POST['submit'])){
	
	$update_id=  mysqli_real_escape_string($conn,$_POST['update_id']);
	$title = mysqli_real_escape_string($conn,$_POST['title']);
	$body = mysqli_real_escape_string($conn,$_POST['body']);
	$author = mysqli_real_escape_string($conn,$_POST['author']);
	$date = mysqli_real_escape_string($conn,$_POST['date']);

	$query= "UPDATE post SET
				title='$title',
				author='$author',
				body='$body'
				code= {$update_code}
				WHERE id = {$update_id}";

	if(mysqli_query($conn,$query)){
		header('Location:'.ROOT_URL.'');
	}
	else{
		echo 'ERROR'.mysqli_error($conn);
	}
}



$id =  mysqli_real_escape_string($conn,$_GET['id']);

$query = 'SELECT * FROM post WHERE id= '.$id;

$result = mysqli_query($conn, $query);



$post= mysqli_fetch_assoc($result);


?>




?>

<?php include('inc/header.php'); ?>

<br>
<br>
<br>
<br>
	<div class="container">
		<h1>Add Post</h1>

		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control" value="<?php echo $post['title']; ?>">
			</div>

			<div class="form-group">
				<label>Author</label>
				<input type="text" name="author" class="form-control" value="<?php echo $post['author']; ?>">
			</div>

			
			<div class="form-group">
				<label>Body</label>
				<textarea name="body" class="form-control"><?php echo $post['body']; ?></textarea>
			</div>


			<div class="form-group">
				<label>Date</label>
				<textarea name="body" class="form-control"><?php echo $post['body']; ?></textarea>
			</div>
			



			<input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">

			<input type="hidden" name="update_code" value="<?php echo $post['id']; ?>">

			<input type="submit" name="submit" value="Submit" class="btn btn-primary">

		</form>

</div>

	