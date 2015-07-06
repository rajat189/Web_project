<?php

$con=mysqli_connect("localhost","root","","book5");
function getpro(){
	
			global $con;
			if(!isset($_GET['cat'])){
				if(!isset($_GET['pub'])){
			$get_products="select * from product order by rand() LIMIT 0,6";
			$run_products=mysqli_query($con, $get_products);
			while($row_product=mysqli_fetch_array($run_products)){
				
				$pro_id=$row_product['product_id'];
				$pro_title=$row_product['product_title'];
				$pro_cat=$row_product['cat_id'];
				$pro_pub=$row_product['pub_id'];
				$pro_des=$row_product['product_des'];
				$pro_author=$row_product['product_author'];
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
				}
				}
			}
	}
function getCatPro(){
	
			global $con;
			if(isset($_GET['cat'])){
				
			$cat_id=$_GET['cat'];
			$get_cat_pro="select * from product where cat_id='$cat_id'";
			$run_cat_pro=mysqli_query($con, $get_cat_pro);
			$count=mysqli_num_rows($run_cat_pro);
			if($count==0){
				echo "<h1>No product found in this catagory.</h1>";
				}
			else {	
				$get1="select * from catagories where cat_id='$cat_id'";
				$run1=mysqli_query($con,$get1);
				$row1=mysqli_fetch_array($run1);
				$catagories=$row1['cat_title'];
				echo"<div class='center_title_bar'>$catagories</div>";
				while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
				$pro_id=$row_cat_pro['product_id'];
				$pro_title=$row_cat_pro['product_title'];
				$pro_cat=$row_cat_pro['cat_id'];
				$pro_pub=$row_cat_pro['pub_id'];
				$pro_des=$row_cat_pro['product_des'];
				$pro_author=$row_cat_pro['product_author'];
				$pro_img=$row_cat_pro['product_img'];
				
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
				}
			}
				
			}
	}
function getPubPro(){
	
			global $con;
			if(isset($_GET['pub'])){
				
			$pub_id=$_GET['pub'];
			$get_pub_pro="select * from product where pub_id='$pub_id'";
			$run_pub_pro=mysqli_query($con, $get_pub_pro);
			$count=mysqli_num_rows($run_pub_pro);
			if($count==0){
				echo "<h1>No product found in this catagory.</h1>";
				}
			
            else {
			$get="select * from publication where pub_id='$pub_id'";
			$run=mysqli_query($con,$get);
			$row=mysqli_fetch_array($run);
			$publication=$row['pub_title'];
			echo "<div class='center_title_bar'>$publication</div>";
			
			while($row_pub_pro=mysqli_fetch_array($run_pub_pro)){
				
				$pro_id=$row_pub_pro['product_id'];
				$pro_title=$row_pub_pro['product_title'];
				$pro_cat=$row_pub_pro['cat_id'];
				$pro_pub=$row_pub_pro['pub_id'];
				$pro_des=$row_pub_pro['product_des'];
				$pro_author=$row_pub_pro['product_author'];
				$pro_img=$row_pub_pro['product_img'];
				
				
				
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
				}
			}
				
			}
	}
function getcat(){
			global $con;
			$get_cats="select * from catagories";
          	$run_cats=mysqli_query($con,$get_cats);
			while($row_cats=mysqli_fetch_array($run_cats)){
				$cat_id=$row_cats['cat_id'];
				$cat_title=$row_cats['cat_title'];
				?>
                <li class="odd">
				<?php echo "<a href='index?cat=$cat_id'>$cat_title</a>";?>
                </li>
                <?php
			}
	}
function getpub(){
	
			global $con;
			$get_pubs="select * from publication";
          	$run_pubs=mysqli_query($con,$get_pubs);
			while($row_pubs=mysqli_fetch_array($run_pubs)){
				$pub_id=$row_pubs['pub_id'];
				$pub_title=$row_pubs['pub_title'];
				?>
                <li class="even">
				<?php echo "<a href='index?pub=$pub_id'>$pub_title</a>";?>
                </li>
                <?php
			}
	}
function get_detail(){
	
				global $con;
				if(isset($_GET['pro_id'])){
					
				$product_id=$_GET['pro_id'];
				
				$get_products="select * from product where product_id='$product_id'";
				$run_products=mysqli_query($con, $get_products);
				while($row_product=mysqli_fetch_array($run_products)){
				
				$pro_id=$row_product['product_id'];
				$pro_title=$row_product['product_title'];
				$pro_cat=$row_product['cat_id'];
				$pro_pub=$row_product['pub_id'];
				$pro_des=$row_product['product_des'];
				$pro_author=$row_product['product_author'];
				$pro_img=$row_product['product_img'];
				$pro_quality=$row_product['product_quality'];
				$pro_size=$row_product['product_size'];
				$pro_down=$row_product['download'];
				
				$get="select * from publication where pub_id='$pro_pub'";
				$run=mysqli_query($con,$get);
				$row=mysqli_fetch_array($run);
				$publication=$row['pub_title'];
                                $tmp='rating_';
				$tmp.=$pro_id;
				echo "
<div class='center_title_bar'>$pro_title</div>
	<div class='prod_box_big'>
		<div class='top_prod_box_big'></div>
		<div class='center_prod_box_big'>
		<div class='product_img_big'> <a href='javascript:popImage('images/big-letusc8.jpg','Some Title')' title='header=[Zoom] body=[&nbsp;] fade=[on]'><img src='admin/products/$pro_img' alt='' border='0' width='110px' height='160px'/></a>
		</div>
		<div class='details_big_box'>
			<div class='product_title_big'>Specifications of $pro_title</div>
				<div class='specifications'> 
              		By: <span class='blue'>$pro_author</span><br />
              		Publisher: <span class='blue'>$publication</span><br />
              		Quality: <span class='blue'>$pro_quality</span><br />
              		Language: <span class='blue'>English</span><br />
              		Size: <span class='blue'>$pro_size MB</span><br />
            	</div>
            <div class='prod_price_big'><span class='price'>FREE</span></div>
            <a href='https://drive.google.com/uc?export=download&id=$pro_down' class='addtocart'>download</a> <a href='https://drive.google.com/open?id=$pro_down&authuser=0' class='compare' target='_blank'>view</a> 
		</div>
<div id='$tmp' class='ratings'>
                <div class='star_1 ratings_stars'></div>
                <div class='star_2 ratings_stars'></div>
                <div class='star_3 ratings_stars'></div>
                <div class='star_4 ratings_stars'></div>
                <div class='star_5 ratings_stars'></div>
                <div class='total_votes'>vote data</div>
            </div>
        <div id='contain'><p class='dc'>$pro_des</p>
		</div>
        </div>
        <div class='bottom_prod_box_big'></div>
     </div>
				";
				}}
				
	}
function get_recom(){
	
				global $con;
				if(isset($_GET['pro_id'])){
				$product_id=$_GET['pro_id'];
				
				$getting="select * from product where product_id='$product_id'";
				$running=mysqli_query($con,$getting);
				$rowing=mysqli_fetch_array($running);
				$product_cat=$rowing['cat_id'];
				
				$get_products="select * from product left join catagories on catagories.cat_id=product.product_id where product.cat_id='$product_cat' limit 3";
				$run_products=mysqli_query($con, $get_products);
				while($row_product=mysqli_fetch_array($run_products)){
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
				}
				}
		
	}
function get_special(){
	
			global $con;
			$is_special=1;
			$get_pub_pro="select * from product where special='$is_special'";
			$run_pub_pro=mysqli_query($con, $get_pub_pro);
			$count=mysqli_num_rows($run_pub_pro);
			if($count==0){
				echo "<h1>No product found in this catagory.</h1>";
				}
			
            else {
			
			while($row_pub_pro=mysqli_fetch_array($run_pub_pro)){
				
				$pro_id=$row_pub_pro['product_id'];
				$pro_title=$row_pub_pro['product_title'];
				$pro_cat=$row_pub_pro['cat_id'];
				$pro_pub=$row_pub_pro['pub_id'];
				$pro_des=$row_pub_pro['product_des'];
				$pro_author=$row_pub_pro['product_author'];
				$pro_img=$row_pub_pro['product_img'];
				
				
				
				echo "
				
				<div class='prod_box'>
        			<div class='top_prod_box'></div>
        			<div class='center_prod_box'>
          				<div class='product_title'>$pro_title</div>
          				<div class='product_img'><img src='admin/products/$pro_img' alt='' border='0' width='100px' height='125px'/></div>
          				<div class='prod_price'><span class='price'>FREE</span></div>
        			</div>
        			<div class='bottom_prod_box'></div>
        			<div class='prod_details_tab'><a href='details.php?pro_id=$pro_id' class='prod_details'>details</a></div>
      			</div>
				";
				}
			}
	}
function getLatPro(){
	global $con;
			
			if(!isset($_GET['cat'])){
				if(!isset($_GET['pub'])){
			$get_products="select * from product order by product_id desc LIMIT 3";
			$run_products=mysqli_query($con, $get_products);
			echo "<div class='center_title_bar'>Latest Post</div>";
			while($row_product=mysqli_fetch_array($run_products)){
				
				$pro_id=$row_product['product_id'];
				$pro_title=$row_product['product_title'];
				$pro_cat=$row_product['cat_id'];
				$pro_pub=$row_product['pub_id'];
				$pro_des=$row_product['product_des'];
				$pro_author=$row_product['product_author'];
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
        			<div class='prod_details_tab'><a href='details.php?pro_id=$pro_id' class='prod_details'>details</a></div>
      			</div>
				
				";
				}
				}
			}
	}
?>