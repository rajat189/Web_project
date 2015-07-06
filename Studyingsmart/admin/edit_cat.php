<?php 
include("includes/db.php");
if(!isset($_SESSION['user_name'])){
	header("location: login.php");
	}
	else {
if(isset($_GET['edit_cat'])){
	$cat_id=$_GET['edit_cat'];
	$delete_cat="select * from catagories where cat_id='$cat_id'";
		$run_delete=mysqli_query($con,$delete_cat);
		$row_delete=mysqli_fetch_array($run_delete);
		$cat_id=$row_delete['cat_id'];
		$cat_title=$row_delete['cat_title'];
}
?>

<form action="" method="post" style="padding:80px">
<b>Edit This Catagory : </b>
<input type="text" name="new_cat" value="<?php echo $cat_title;?>"/>
<input type="submit" name="update_cat" value="Update Catagory"/>
</form>
<?php
if(isset($_POST['update_cat'])){
$update_id=$cat_id;
$new_cat=$_POST['new_cat'];
$update_cat="update catagories set cat_title='$new_cat' where cat_id='$update_id'";
$run_cat=mysqli_query($con,$update_cat);
if($run_cat){
	echo "<script>alert('Category Has Been Updated!')</script>";
	echo "<script>window.open('index.php?view_cats','_self')</script>";
	}
}
?>
<?php }?>