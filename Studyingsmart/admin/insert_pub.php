<?php
if(!isset($_SESSION['user_name'])){
	header("location: login.php");
	}
	else {
?>
<form action="" method="post" style="padding:80px">
<b>Insert New Publication : </b>
<input type="text" name="new_pub" required/>
<input type="submit" name="add_pub" value="Add Publication"/>
</form>
<?php
include("includes/db.php");
if(isset($_POST['add_pub'])){
$new_pub=$_POST['new_pub'];
$insert_pub="insert into publication (pub_title) values ('$new_pub')";
$run_pub=mysqli_query($con,$insert_pub);
if($run_pub){
	echo "<script>alert('New Publication Has Been Inserted!')</script>";
	echo "<script>window.open('index.php?view_pubs','_self')</script>";
	}
}
?>
<?php }?>