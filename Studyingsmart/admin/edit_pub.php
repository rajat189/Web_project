<?php 
include("includes/db.php");
if(!isset($_SESSION['user_name'])){
	header("location: login.php");
	}
	else {
if(isset($_GET['edit_pub'])){
	$pub_id=$_GET['edit_pub'];
	$delete_pub="select * from publication where pub_id='$pub_id'";
		$run_delete=mysqli_query($con,$delete_pub);
		$row_delete=mysqli_fetch_array($run_delete);
		$pub_id=$row_delete['pub_id'];
		$pub_title=$row_delete['pub_title'];
}
?>

<form action="" method="post" style="padding:80px">
<b>Update This Publication : </b>
<input type="text" name="new_pub" value="<?php echo $pub_title;?>"/>
<input type="submit" name="update_pub" value="Update Publication"/>
</form>
<?php
include("includes/db.php");
if(isset($_POST['update_pub'])){
$update_id=$pub_id;
$new_pub=$_POST['new_pub'];
$insert_pub="update publication set pub_title='$new_pub' where pub_id='$update_id'";
$run_pub=mysqli_query($con,$insert_pub);
if($run_pub){
	echo "<script>alert('Publication Has Been Updated!')</script>";
	echo "<script>window.open('index.php?view_pubs','_self')</script>";
	}
}
?>
<?php }?>