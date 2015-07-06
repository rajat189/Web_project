<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="style/login_style.css" media="all"/>
</head>

<body>
<div class="login">
<h2 style="color:white; text-align:center;"><?php echo @$_GET['not_admin'];?></h2>
<h2 style="color:white; text-align:center;"><?php echo @$_GET['logged_out'];?></h2>
	<h1>Admin Login</h1>
    <form method="post" action="login.php">
    	<input type="text" name="user_name" placeholder="Username" required />
        <input type="password" name="user_pass" placeholder="Password" required />
        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Login</button>
    </form>
</div>
</body>
</html>
<?php
include("includes/db.php");
if(isset($_POST['login'])){
	$user_name=$_POST['user_name'];
	$user_pass=$_POST['user_pass'];
	
	$sel_user="select * from admins where user_name='$user_name' AND user_pass='$user_pass'";
	$run_user=mysqli_query($con,$sel_user);
	$row_user=mysqli_fetch_array($run_user);
	
	if($row_user==0){
		echo "<script>alert('Username or Password is wrong,Try again!')</script>";
		}
	else{
		$_SESSION['user_name']=$user_name;
		echo "<script>window.open('index.php','_self')</script>";
		}
	}
?>