
<!DOCTYPE html>
<html lang="urdu">

 <?php include('HeaderFooter/header.php'); 
       include('configure/connect.php'); 
  
  $sql=" select name,id,skills from table1";
  $result=mysqli_query($conn,$sql);
  $pizzas=mysqli_fetch_all($result,MYSQLI_ASSOC);
  //print_r($students);
 ?>

 <h4 class="center black-text "> Members</h4>

 <div class="container " >
 	<div class="row ">
 		<?php foreach($pizzas as $pza):
 			 $skl=explode(',',$pza['skills']);
 			   ?>
              <div class="col s6 md3 ">
              	<div class="card  lighten-3 z-depth-3">
                  <img src="aaa.jpg" class="aaa">

              		<div class="center card-content "><a href="details.php?id=<?php echo $pza['id'];?>" >
              			<h4 class="black-text"><?php echo strtoupper(htmlspecialchars($pza['name'])); ?></h4>

              			<ul><?php foreach($skl as $single_skill):?>
              				<li class="black-text"><?php echo  htmlspecialchars($single_skill); ?></li>

              			<?php endforeach ;?>
              		     </ul>
              		 </a>

              		</div>
              		<div class="card-action right-align">
              			<a href="details.php?id=<?php echo $pza['id'];?>" id="logo" class="brand-text"> more info</a>
              		</div>
              	</div>
              </div>
 			<?php endforeach;?>
 	</div>
 </div>

 




 <?php include('HeaderFooter/footer.php');  ?>
</html>