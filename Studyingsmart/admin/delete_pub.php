<?php
	include('includes/db.php');
	if(isset($_GET['delete_pub'])){
		$delete_id=$_GET['delete_pub'];
		$delete_pub="delete from publication where pub_id='$delete_id'";
		$run_delete=mysqli_query($con,$delete_pub);
		
		if($run_delete){
			echo "<script>alert('A publication has been deleted!')</script>";
			echo "<script>window.open('index.php?view_pubs','_self')</script>";
		}
	}
?>