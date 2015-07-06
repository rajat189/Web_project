<?php
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Studying Smart</title>

<link rel="stylesheet" type="text/css" href="style/style.css" />
<link rel="stylesheet" type="text/css" href="slide/style1.css" />
<script type="text/javascript" src="slide/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$('.ratings_stars').hover(
	function() {
		$(this).prevAll().andSelf().addClass('ratings_over');
	},
	function() {
		$(this).prevAll().andSelf().removeClass('ratings_over');
	}
);
$('.ratings_stars').bind('click', function() {
	var id=$(this).parent().attr("id");
	var num=$(this).attr("class");
	var poststr="id="+id+"&stars="+num;
	$.ajax({url:"rate.php",cache:0,data:poststr,success:function(result){
		document.getElementById(id).innerHTML=result;}
		});	
});
});
</script>
<link rel="shortcut icon" href="images/icon.ico" type="image/x-icon" />
</head>
<body>
<div id="main_container">
  <div class="top_bar">
    <div class="top_search">
      <div class="search_text"><a href="#">Advanced Search</a></div>
      <form method="get" action="results" enctype="multipart/form-data">
		<input type="text" class="search_input" name="user_query" />
        <input type="image" name="search" value="Search" class="search_bt" src="images/search.gif"/>
	  </form>
    </div>
    <div class="languages">
      <a href="#" class="lang"><img src="" alt="" border="0" /></a> <a href="#" class="lang"><img src="" alt="" border="0" /></a> </div>
  </div>
  <div id="header">
    <div id="logo"> <a href="#"><img src="images/logo1.png" alt="" border="0" width="237" height="140" /></a> </div>
    <div class="oferte_content">
      <div class="top_divider"><img src="images/header_divider.png" alt="" width="1" height="164" /></div>
      <div class="oferta">
        <div class="oferta_content">
            <div id="wowslider-container1">
		<div class="ws_images">
    		<ul>
				<li><img src="slide/images/1a.png" alt="" title="" id="wows1_0"/></li>
				<li><img src="slide/images/2a.png" alt="" title="" id="wows1_1"/></li>
				<li><img src="slide/images/3a.png" alt="" title="" id="wows1_2"/></li>
			</ul>
		</div>
	</div>
	<script type="text/javascript" src="slide/wowslider.js"></script>
	<script type="text/javascript" src="slide/script.js"></script>
        </div>
      </div>
    </div>
  </div>
  <div id="main_content">
    <div id="menu_tab">
      <div class="left_menu_corner"></div>
      <ul class="menu">
        <li><a href="index" class="nav1"> Home</a></li>
        <li class="divider"></li>
        <li><a href="all" class="nav2">Our Books</a></li>
        <li class="divider"></li>
        <li><a href="special" class="nav3">Specials</a></li>
        <li class="divider"></li>
        <li><a href="about" class="nav4">About Us</a></li>
        <li class="divider"></li>
        <li><a href="feedback" class="nav5">Feedback</a></li>
        <li class="divider"></li>
        <li><a href="contact" class="nav6">Contact Us</a></li>
      </ul>
      <div class="right_menu_corner"></div>
    </div>
    <div class="left_content">
      <div class="title_box">Categories</div>
      <ul class="left_menu">
        <?php getcat();
		?>
      </ul>
      <div class="title_box">Special Products</div>
      <div class="border_box">
        <div class="product_title"></div>
        <div class="product_img"><a href="special"><img src="randim?type=1&amp;folder=specials"></a></div>
        <div class="prod_price"><span class="price">FREE</span></div>
      </div>
      <div class="title_box">Feedback</div>
      <div class="border_box">
        <input type="text" name="newsletter" class="newsletter_input" value="Message"/>
        <a href="feedback" class="join">add</a> </div>
      <div class="banner_adds"> <a href="feedback"><img src="images/bann4.gif" alt="" border="0" /></a> </div>
    </div>
    <div class="center_content">
      <?php get_detail();?>
                <div class="center_title_bar">Recommended Books</div>
      <?php get_recom();?>
      
    </div>
    <div class="right_content">
      <div class="shopping_cart" >
        <a href="#" class="cart_title">website hits</a><br/><div class="cart_details"><script type="text/javascript" src="http://counter1.allfreecounter.com/private/counter.js?c=21ef91a3cd4efe47b95e57efdbaf2197"></script></div>
      </div>
      <div class="title_box">What’s new</div>
      <div class="border_box">
        <div class="product_img"><a href="#"><img src="randim?type=1&amp;folder=new"></a></div>
        <div class="prod_price"><span class="price">FREE</span></div>
      </div>
      <div class="title_box">Publications</div>
      <ul class="left_menu">
        <?php getpub(); ?>
      </ul>
      <div class="banner_adds"> <a href="#"><img src="images/bann3.jpg" alt="" border="0" /></a> </div>
    </div>
  </div>
  <div class="footer">
    <div class="left_footer"> <img src="images/logo1.png" alt="" width="170" height="49"/> </div>
    <div class="center_footer"> &copy; 2015 Studyingsmart.in &bull; All Rights Reserved<br />
       </div>
    <div class="right_footer"> <a href="index">Home</a><a href="about">About</a><a href="contact">Contact us</a> <a href="terms">Terms Of Use</a> <a href="privacy">Privacy</a></div>
  </div>
</div>
</body>
</html>
