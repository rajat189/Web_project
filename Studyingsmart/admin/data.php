<?php
include("dbcon.php");

$per_page = 10;
$sqlc = "show columns from product";
$rsdc = mysql_query($sqlc);
$cols = mysql_num_rows($rsdc);
$page = $_REQUEST['page'];

$start = ($page-1)*10;
$sql = "select * from product order by product_id limit $start,10";
$rsd = mysql_query($sql);
?>
<html>
<head>
</head>
<body>
<p style="font-size:24px; font-weight:bolder;">View All Product</p>
<table width="800" align="center" bgcolor="pink">

	<tr>
    	<td></td>
    </tr>
    <tr align="center" bgcolor="skyblue">
    	<th>S.N.</th>
        <th>Title</th>
        <th>Image</th>
        <th>Author</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
		$i=0;
		while($row_pro = mysql_fetch_assoc($rsd)){
			$pro_id=$row_pro['product_id'];
			$pro_title=$row_pro['product_title'];
			$pro_image=$row_pro['product_img'];
			$pro_author=$row_pro['product_author'];
			$i++;
		
    ?>
    <tr>
    	<td><?php echo "$pro_id";?></td>
        <td><?php echo "$pro_title";?></td>
        <td><img src="products/<?php echo "$pro_image";?>" width="60" height="60" /></td>
        <td><?php echo "$pro_author";?></td>
        <td><a href="index.php?edit_pro=<?php echo $pro_id;?>">Edit</a></td>
        <td><a href="delete_pro.php?delete_pro=<?php echo $pro_id;?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>

<script type="text/javascript">
$(document).ready(function(){

	var Timer  = '';
	var selecter = 0;
	var Main =0;

	bring(selecter);

});

function bring ( selecter )
{
	$('div.shopp:eq(' + selecter + ')').stop().animate({
		opacity  : '1.0',
		height: '60px'

	},300,function(){

		if(selecter < 6)
		{
			clearTimeout(Timer);
		}
	});

	selecter++;
	var Func = function(){ bring(selecter); };
	Timer = setTimeout(Func, 20);
}

</script>
</body></html>