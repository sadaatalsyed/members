
<?php
$email=$title=$ingredients="";
$errors=array('email'=>'','title'=>'','ingredients'=>'');
?>
<?php include('configure/connect.php');?>
<?php
if(isset($_POST['submit'])){
	$email=htmlspecialchars($_POST['email']);
	$title=htmlspecialchars($_POST['title']);
	$ingredients=htmlspecialchars($_POST['ingredients']);
if(empty($email)){
	$errors['email']= "Email is required <br />";
}
else{
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
	$errors['email']= "Email is not valid.Please provide valid email address.<br />";
}
}
if(empty($title)){
    $errors['title']="Name is required"."<br />";
}
else{
	
	if(!preg_match(('/^[a-zA-Z\s]+$/'), $title)){
	$errors['title']="Name must be letters and spaces only";

	}
}if(empty($ingredients)){
	$errors['ingredients']= "At least one skill is required"."<br />";
}
else{
	if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z]*)*$/', $ingredients)){
		$errors['ingredients']="Skills must be comma seperated list";

	}}

	if(array_filter($errors)){
		//echo "go to home page";
	}
	else{
		$email=mysqli_real_escape_string($conn,$_POST['email']);
		$title=mysqli_real_escape_string($conn,$_POST['title']);
		$ingredients=mysqli_real_escape_string($conn,$_POST['ingredients']);
		$sql="INSERT INTO table1(name,email,skills) Values ('$title','$email','$ingredients')";
		if(!mysqli_query($conn,$sql)){
          echo "query error:".mysqli_error($conn);
		}else{ header('Location:index.php'); }

}}
?>
<!DOCTYPE html>
<html>

 <?php include('HeaderFooter/header.php');  ?>


 	<h4 class="center black-text" id="addtitle"> Add A Member</h4>
 	<form class="blue lighten-4 z-depth-3" action="add.php" method="POST">
 		<div > <label>Your Email:</label>
 		 <input type="text" name="email" value="<?php echo htmlspecialchars($email) ;?>">
 		 <div class="red-text"><?php echo $errors['email'];?></div>
 		  <label>Full Name:</label>
 		 <input type="text" name="title" value="<?php echo htmlspecialchars($title);?>">
 		 <div class="red-text"><?php echo $errors['title'];?></div>
 		  <label>Your Skills (comma seperated):</label>
 		 <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ;?>">
 		 <div class="red-text"><?php echo $errors['ingredients'];?></div>
 		 </div>
 		 <div class="center">
 		 	<input type="submit" name="submit" value="submit" class="btn brand z-depth-1">
 		 </div>
 	</form>
 


 <?php include('HeaderFooter/footer.php');  ?>
</html>