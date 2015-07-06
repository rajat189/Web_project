<?php
include("includes/db.php");
if(!isset($_SESSION['user_name'])){
	header("location: login.php");
	}
	else {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Books</title>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
</head>

<body bgcolor="#999999">
	<form method="post" action="" enctype="multipart/form-data">
    	<table width="800" align="center" border="1" bgcolor="#0099CC">
        	<tr align="center">
            	<td colspan="2"><p class="heading">Insert Product :</p></td>
            </tr>
            <tr>
            	<td align="right"><b>Product Title</b></td>
            	<td><input type="text" name="product_title" size="50"/></td>
            </tr>
            <tr>
            	<td align="right"><b>Product Category</b></td>
            	<td>
                	<select name="product_cat">
                    	<option>Select a category</option>
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
                    	<option>Select a Publication</option>
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
            	<td><input type="text" name="is_special"/></td>
            </tr>
            <tr>
            	<td align="right"><b>Product Image</b></td>
            	<td><input type="file" name="product_img"/></td>
            </tr>
            
            <tr>
            	<td align="right"><b>Product Author</b></td>
            	<td><input type="text" name="product_author"/></td>
            </tr>
            <tr>
            	<td align="right"><b>Product Size</b></td>
            	<td><input type="text" name="product_size"/></td>
            </tr>
            <tr>
            	<td align="right"><b>Product Quality</b></td>
            	<td>
                	<select name="product_quality">
                		<option>Good</option>
                        <option>Moderate</option>
                        <option>Poor</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td align="right"><b>Product Link</b></td>
            	<td><input type="text" name="product_link" size="50"/></td>
            </tr>
            <tr>
            	<td align="right"><b>Product Description</b></td>
            	<td><textarea name="product_des" cols="35" rows="10"></textarea></td>
            </tr>
            <tr>
            	<td align="right"><b>Product Keyword</b></td>
            	<td><input type="text" name="product_keyword" size="50"/></td>
            </tr>
            <tr align="center">
            	<td colspan="2"><input type="submit" name="insert_product" value="Insert Product"/></td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
	if(isset($_POST['insert_product'])){
		$product_title=$_POST['product_title'];
		$product_cat=$_POST['product_cat'];
		$product_pub=$_POST['product_pub'];
		$product_author=$_POST['product_author'];
		$product_des=$_POST['product_des'];
		$product_link=$_POST['product_link'];
		$product_size=$_POST['product_size'];
		$product_quality=$_POST['product_quality'];
		$product_special=$_POST['is_special'];
		$status='on';
		$product_keyword=$_POST['product_keyword'];
		
		$product_img=$_FILES['product_img']['name'];
		
		$tmp_img=$_FILES['product_img']['tmp_name'];
		
		if($product_title=='' or $product_cat=='' or $product_pub=='' or $product_des=='' or $product_keyword=='' or $product_img=='' or $product_author=='' or $product_link=='' or $product_quality=='' or $product_size=='' or $product_special==''){
			echo "<script>alert('Please Fill The Fields!')</script>";
			exit();
			}
		else if($product_cat==0 or $product_pub==0){
			echo "<script>alert('Please Fill The Fields!')</script>";
			exit();
			}
		else {
			
		move_uploaded_file($tmp_img,"products/$product_img");
		$insert_product="insert into product (cat_id,pub_id,special,date,product_title,product_img,product_author,product_des,download,product_quality,product_size,product_keyword,status) values ('$product_cat','$product_pub','$product_special',NOW(),'$product_title','$product_img','$product_author','$product_des','$product_link','$product_quality','$product_size','$product_keyword','$status')";
		
		$run_product=mysqli_query($con,$insert_product);
		if($run_product){
			echo "<script>alert('Updated Succesfully.')</script>";
			echo "<script>window.open('index.php?view_product','_self')</script>";
			}
		}
		
	}
?>
<?php }?>