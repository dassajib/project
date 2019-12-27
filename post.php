<?php

require('config/db.php');
require('config/config.php');

if(isset($_POST['delete'])){
	$delete_id=  mysqli_real_escape_string($conn,$_POST['delete_id']);
	

	$query= "DELETE FROM post WHERE id={$delete_id}";

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

//Fetch Data

$post= mysqli_fetch_assoc($result);

//var_dump($posts);
?>

<?php include('inc/header.php'); ?>

<br>
<br>
<br>
<br>
<br>
	<div class="container">
	

		
			<a href="<?php echo ROOT_URL; ?>" class="btn btn-info">Back</a>
				<h1> <?php echo $post['title'];?></h1>
				<small>Created On <?php echo $post['created_at'];?> By <?php echo $post['author'];?> </small>
				<p><?php echo $post['body'];?></p>
				<hr>

				<form class="pull-right" method="POST" method="<?php echo $_SERVER['PHP_SELF']; ?>">

					<input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">

					<input type="submit" name="delete" value="Delete" class="btn btn-danger">
					
				</form>






				<a class="btn btn-outline-success "href="editpost.php?id=<?php echo $post['id'];?>">Edit</a>

</div>
<hr>
	<?php include('inc/footer.php'); ?>