<?php
session_start();
if(!isset($_SESSION['user_name'])){
	header("location: login.php");
	}
	else {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Panel</title>
<link type="text/css" rel="stylesheet" href="style/style.css" media="all"/>
</head>

<body>
	<div class="main_wrapper">
    	<div class="header">
        	<div id="logo">Admin Panel</div>
            <p style="float:right; margin-bottom:0;">Welcome : <font color="red" size="5"><?php echo $_SESSION['user_name'];?></font></p>
        </div>
    	<div id="right">
        	<h2 style="text-align:center">Manage Content</h2>
        	<a href="index.php?insert_product">Insert New Product</a>
            <a href="index.php?view_product">View All Product</a>
            <a href="index.php?insert_cat">Insert New Catagory</a>
            <a href="index.php?view_cats">View All Catagory</a>
            <a href="index.php?insert_pub">Insert New Publication</a>
            <a href="index.php?view_pubs">View All Publication</a>
            <a href="logout.php">Admin Logout</a>
        </div>
        <div id="left">
        <br><br>
        <?php
			if(isset($_GET['insert_product'])){
				include("insert_product.php");
				}
			if(isset($_GET['view_product'])){
				include("view_product.php");
				}
			if(isset($_GET['edit_pro'])){
				include("edit_pro.php");
				}
			if(isset($_GET['insert_cat'])){
				include("insert_cat.php");
				}
			if(isset($_GET['view_cats'])){
				include("view_cats.php");
				}
			if(isset($_GET['edit_cat'])){
				include("edit_cat.php");
				}
			if(isset($_GET['insert_pub'])){
				include("insert_pub.php");
				}
			if(isset($_GET['view_pubs'])){
				include("view_pub.php");
				}
			if(isset($_GET['edit_pub'])){
				include("edit_pub.php");
				}
		?>
        
        </div>
    </div>

</body>
</html>	
<?php } ?>