<?php
if(!isset($_SESSION['user_name'])){
	header("location: login.php");
	}
	else {
?>
<!doctype html>
<?php
include("includes/db.php");

if(isset($_GET['edit_pro'])){
		$get_id=$_GET['edit_pro'];
		$get_pro="select * from product where product_id='$get_id'";
		$run_pro=mysqli_query($con,$get_pro);
			
			$row_pro=mysqli_fetch_array($run_pro);
			$pro_id=$row_pro['product_id'];
			$pro_title=$row_pro['product_title'];
			$pro_image=$row_pro['product_img'];
			$pro_author=$row_pro['product_author'];
			$pro_des=$row_pro['product_des'];
			$pro_keyword=$row_pro['product_keyword'];
			$pro_cat=$row_pro['cat_id'];
			$pro_pub=$row_pro['pub_id'];
			$pro_special=$row_pro['special'];
			$pro_down=$row_pro['download'];
			$pro_quality=$row_pro['product_quality'];
			$pro_size=$row_pro['product_size'];
			
			$get_cat="select * from catagories where cat_id='$pro_cat'";
			$run_cat=mysqli_query($con,$get_cat);
			$row_cat=mysqli_fetch_array($run_cat);
			$catagory_title=$row_cat['cat_title'];
			
			$get_pub="select * from publication where pub_id='$pro_pub'";
			$run_pub=mysqli_query($con,$get_pub);
			$row_pub=mysqli_fetch_array($run_pub);
			$publication_title=$row_pub['pub_title'];
}
?>
<html>
<head>
<meta charset="utf-8">
<title>Edit Product</title>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
</head>

<body bgcolor="#999999">

	<form method="post" action="" enctype="multipart/form-data">
    	<table width="800" align="center" border="1" bgcolor="#0099CC">
        	<tr align="center">
            	<td colspan="2"><p class="heading">Edit & Update Product :</p></td>
            </tr>
            <tr>
            	<td align="right"><b>Product Title</b></td>
            	<td><input type="text" name="product_title" size="60" value="<?php echo $pro_title;?>"/></td>
            </tr>
            <tr>
            	<td align="right"><b>Product Category</b></td>
            	<td>
                	<select name="product_cat">
                    	<option><?php echo $catagory_title;?></option>
                        <?php
			
							$get_cats="select * from catagories";
          					$run_cats=mysqli_query($con,$get_cats);
							while($row_cats=mysqli_fetch_array($run_cats)){
								$cat_id=$row_cats['cat_id'];
								$cat_title=$row_cats['cat_title'];
								echo "<option value='$cat_id'>$cat_title</option>";
							}
						?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td align="right"><b>Product Publication</b></td>
            	<td>
                	<select name="product_pub">
                    	<option><?php echo $publication_title;?></option>
                        <?php
			
			$get_pubs="select * from publication";
          	$run_pubs=mysqli_query($con,$get_pubs);
			while($row_pubs=mysqli_fetch_array($run_pubs)){
				$pub_id=$row_pubs['pub_id'];
				$pub_title=$row_pubs['pub_title'];
				echo "<option value='$pub_id'>$pub_title</option>";
			}
			?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td align="right"><b>Is Special(0 or 1)</b></td>
            	<td><input type="text" name="product_special" value="<?php echo $pro_special;?>"/></td>
            </tr>
            <tr>
            	<td align="right"><b>Product Image</b></td>
            	<td><input type="file" name="product_img"/><img src="products/<?php echo $pro_image;?>" width="60" height="60"/></td>
            </tr>
            
            <tr>
            	<td align="right"><b>Product Author</b></td>
            	<td><input type="text" name="product_author" value="<?php echo $pro_author;?>"/></td>
            </tr>
            <tr>
            	<td align="right"><b>Product Quality</b></td>
            	<td><input type="text" name="product_quality" value="<?php echo $pro_quality;?>"/></td>
            </tr>
            <tr>
            	<td align="right"><b>Product Size</b></td>
            	<td><input type="text" name="product_size" value="<?php echo $pro_size;?>"/></td>
            </tr>
            <tr>
            	<td align="right"><b>Product Link</b></td>
            	<td><input type="text" name="product_down" value="<?php echo $pro_down;?>"/></td>
            </tr>
            <tr>
            	<td align="right"><b>Product Description</b></td>
            	<td><textarea name="product_des" cols="35" rows="10"><?php echo $pro_des;?></textarea></td>
            </tr>
            <tr>
            	<td align="right"><b>Product Keyword</b></td>
            	<td><input type="text" name="product_keyword" size="50" value="<?php echo $pro_keyword;?>"/></td>
            </tr>
            <tr align="center">
            	<td colspan="2"><input type="submit" name="update_product" value="Update Product"/></td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
	if(isset($_POST['update_product'])){
		$update_id=$pro_id;
		$product_title=$_POST['product_title'];
		$product_cat=$_POST['product_cat'];
		$product_pub=$_POST['product_pub'];
		$product_author=$_POST['product_author'];
		$product_des=$_POST['product_des'];
		$product_quality=$_POST['product_quality'];
		$product_size=$_POST['product_size'];
		$product_special=$_POST['product_special'];
		$product_down=$_POST['product_down'];
		$status='on';
		$product_keyword=$_POST['product_keyword'];
		
		$product_img=$_FILES['product_img']['name'];
		
		$tmp_img=$_FILES['product_img']['tmp_name'];
		
		if($product_title=='' or $product_cat=='' or $product_pub=='' or $product_author=='' or $product_des=='' or $product_keyword=='' or $product_img=='' or $product_quality=='' or $product_size=='' or $product_down=='' or $product_special==''){
			echo "<script>alert('Please Fill The Fields!')</script>";
			exit();
			}
		else {
			
		move_uploaded_file($tmp_img,"products/$product_img");
		$update_product="update product set cat_id='$product_cat',pub_id='$product_pub',special='$product_special',product_title='$product_title',product_author='$product_author',product_des='$product_des',product_quality='$product_quality',product_size='$product_size',download='$product_down',product_img='$product_img',product_keyword='$product_keyword' where product_id='$update_id'";
		
		$run_product=mysqli_query($con,$update_product);
		if($run_product){
			echo "<script>alert('Updated Succesfully.')</script>";
			echo "<script>window.open('index.php?view_product','_self')</script>";
			}
		
		}
		
	}
?>
<?php }?>