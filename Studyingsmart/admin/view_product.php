<?php 
if(!isset($_SESSION['user_name'])){
	header("location: login.php");
	}
	else {
?>
<html>
<head>
<link rel="stylesheet" type="text/css" media="screen" href="style/css.css" />
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	function showLoader(){
		$('.search-background').fadeIn(200);
	}
	function hideLoader(){
		$('.search-background').fadeOut(200);
	};
	$("#paging_button li").click(function(){
		showLoader();
		$("#paging_button li").css({'background-color' : ''});
		$(this).css({'background-color' : '#006699'});
		$("#content").load("data.php?page=" + this.id, hideLoader);
		return false;
	});
	$("#1").css({'background-color' : '#006699'});
	showLoader();
	$("#content").load("data.php?page=1", hideLoader);

});
</script>
</head>
<body>
		<?php
			$per_page = 10;
			include("dbcon.php");
			$sql = "select * from product ";
			$rsd = mysql_query($sql);
			$count = mysql_num_rows($rsd);
			$pages = ceil($count/$per_page);
			?>
            <div align="center">
	<div id="container">
		<div class="search-background">
			<label><img src="images/loader.gif" alt="" /></label>
		</div>
		<div id="content">
			&nbsp;
		</div>
	</div>
	<div id="paging_button" align="center">
		<ul>
			<?php
				for($i=1; $i<=$pages; $i++)
				{
						echo '<li id="'.$i.'">'.$i.'</li>';
				}
			?>
		</ul>
	</div>
</div>

<?php }
?>
</body>
</html>