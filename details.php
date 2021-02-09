
<?php 
include('configure/connect.php');
/*if(isset($_POST['delete'])){
	echo $_POST['id_to_delete'];
	$idd=mysqli_real_escape_string($conn,$_POST['id_to_delete']);
	print_r($idd);

	//$sql="DELETE FROM table1 WHERE id=$iddelete";
	$sql="SELECT * from table1 WHERE id=$idd";
	$result=mysqli_query($conn,$sql);
	print_r($result);
	if(mysqli_query($conn,$sql)){
		header('Location: index.php');
	}
	else{ echo "it is a query error:".mysqli_error($conn);}	
}
*/
 if(isset($_GET['id'])){
 	$id=mysqli_real_escape_string($conn,$_GET['id']);
 	$sql="SELECT * from table1 WHERE id=$id";
 	$result=mysqli_query($conn,$sql);
 	$pizza=mysqli_fetch_assoc($result);
 	mysqli_free_result($result);
 	mysqli_close($conn);
 	
 }
 ?>


<!DOCTYPE html>
<html>
<?php include('HeaderFooter/header.php');  ?>


<div class="center container">
	<?php if($pizza):?>
		<h4><?php echo strtoupper( htmlspecialchars($pizza['name'])); ?></h4>
		<p><?php echo "Email : ". htmlspecialchars($pizza['email']); ?></p>
		<p><?php echo "Skills : ".htmlspecialchars($pizza['skills']); ?></p>
			<p ><?php echo "Showing at: ".date('jS F Y'); ?></p>
            <!-- <form action="details.php" method="POST">
             	<input type="hidden" name="id_to_delete" value="<php? echo $pizza['id']?>">
             	<input type="submit" name="delete" value="Delete" class="btn brand z-depth-1">
             </form>
         -->
               
		<?php else:?>
			<p> No such pizza exists.</p>
		<?php endif;?>
	
</div>
 <?php include('HeaderFooter/footer.php');  ?>
</html>