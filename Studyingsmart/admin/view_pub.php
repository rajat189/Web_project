<?php
if(!isset($_SESSION['user_name'])){
	header("location: login.php");
	}
	else {
?>
<table width="800" align="center" bgcolor="pink">

	<tr>
    	<td><h2>View All Publication</h2></td>
    </tr>
    <tr align="center" bgcolor="skyblue">
    	<th>Publication ID</th>
        <th>Publication Title</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
		include("includes/db.php");
		$get_pub="select * from publication";
		$run_pub=mysqli_query($con,$get_pub);
		$i=0;
		while($row_pub=mysqli_fetch_array($run_pub)){
			$pub_id=$row_pub['pub_id'];
			$pub_title=$row_pub['pub_title'];
			$i++;
		
    ?>
    <tr>
    	<td><?php echo "$i";?></td>
        <td><?php echo "$pub_title";?></td>
        <td><a href="index.php?edit_pub=<?php echo $pub_id;?>">Edit</a></td>
        <td><a href="delete_pub.php?delete_pub=<?php echo $pub_id;?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>
<?php }?>