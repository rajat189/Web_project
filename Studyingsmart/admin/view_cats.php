<?php
if(!isset($_SESSION['user_name'])){
	header("location: login.php");
	}
	else {
?>
<table width="800" align="center" bgcolor="pink">

	<tr>
    	<td><h2>View All Categories</h2></td>
    </tr>
    <tr align="center" bgcolor="skyblue">
    	<th>Category ID</th>
        <th>Category Title</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
		include("includes/db.php");
		$get_cat="select * from catagories";
		$run_cat=mysqli_query($con,$get_cat);
		$i=0;
		while($row_cat=mysqli_fetch_array($run_cat)){
			$cat_id=$row_cat['cat_id'];
			$cat_title=$row_cat['cat_title'];
			$i++;
		
    ?>
    <tr>
    	<td><?php echo "$i";?></td>
        <td><?php echo "$cat_title";?></td>
        <td><a href="index.php?edit_cat=<?php echo $cat_id;?>">Edit</a></td>
        <td><a href="delete_cat.php?delete_cat=<?php echo $cat_id;?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>
<?php }?>