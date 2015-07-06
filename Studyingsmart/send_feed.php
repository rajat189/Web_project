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
<link rel="shortcut icon" href="images/icon.ico" type="image/x-icon" />
</head>
<body>
<div id="main_container">
  <div class="top_bar">
    <div class="top_search">
      <div class="search_text"><a href="">Advanced Search</a></div>
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
      <div class="prod_box_big">
        <div class="top_prod_box_big"></div>
        <div class="center_prod_box_big">
          <?php
 
			if(isset($_POST['email'])) {
 
    			$email_to = "contact@studyingsmart.com";
    			$email_subject = "Mail from studyingsmart.in";
    			
    			if(!isset($_POST['name']) ||
        			!isset($_POST['email']) ||
        			!isset($_POST['comments'])) {
        				died('We are sorry, but there appears to be a problem with the form you submitted.');       
    				}

    			$name = $_POST['name'];
    			$email_from = $_POST['email'];
    			$comments = $_POST['comments'];
    			$error_message = "";
    			$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  		
				if(!preg_match($email_exp,$email_from)) {
    				$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  				}
    		
				$string_exp = "/^[A-Za-z .'-]+$/";
  				if(!preg_match($string_exp,$name)) {
    				$error_message .= 'The Name you entered does not appear to be valid.<br />';
  				}
  				if(strlen($comments) < 2) {
    				$error_message .= 'The Feedback you entered do not appear to be valid.<br />';
  				}
  				if(strlen($error_message)>0){
    				echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        			echo "These errors appear below.<br /><br />";
        			echo $error_message."<br /><br />";
        			echo "Please go back and fix these errors.<br /><br />";
  				}
				else {
    			$email_message = "Form details below.\n\n";
    			function clean_string($string) {
      				$bad = array("content-type","bcc:","to:","cc:","href");
      				return str_replace($bad,"",$string);
    			}
    			$email_message .= "Name: ".clean_string($name)."\n";
    			$email_message .= "Email: ".clean_string($email_from)."\n";
    			$email_message .= "Comments: ".clean_string($comments)."\n";
				$headers = 'From: '.$email_from."\r\n".
				'Reply-To: '.$email_from."\r\n" .
				'X-Mailer: PHP/' . phpversion();
				@mail($email_to, $email_subject, $email_message, $headers);  
				?>
				<?php echo"Thank you for contacting us. We will be in touch with you very soon.";
				}?>
				<?php
			}
		?>
        </div>
        <div class="bottom_prod_box_big"></div>
      </div>
      <?php getCatPro(); getPubPro();?>
      
    </div>
    <div class="right_content">
      <div class="shopping_cart" >
        <a href="#" class="cart_title">website hits</a><br/><div class="cart_details"></div>
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
