<?php
include('config.php');
$per_page = 9; 
if($_GET)
{
	$page=$_GET['page'];
}
$start = ($page-1)*$per_page;
$sql = "select * from product order by product_id limit $start,$per_page";
$rsd = mysql_query($sql);
?>
		<?php
		while($row_product = mysql_fetch_array($rsd))
		{
			$pro_id=$row_product['product_id'];
				$pro_title=$row_product['product_title'];
				$pro_img=$row_product['product_img'];
				
				echo "
				<div class='prod_box'>
        			<div class='top_prod_box'></div>
        			<div class='center_prod_box'>
          				<div class='product_title'>$pro_title</div>
          				<div class='product_img'><img src='admin/products/$pro_img' alt='' border='0' width='100px' height='125px'/></div>
          				<div class='prod_price'><span class='price'>FREE</span></div>
        			</div>
        			<div class='bottom_prod_box'></div>
        			<div class='prod_details_tab'><a href='details?pro_id=$pro_id' class='prod_details'>details</a></div>
      			</div>
				";
		?>
		<?php
		}
		?>
