<?php
include("connection/connect.php");
error_reporting(0);
session_start();
if(isset($_POST['submit']))
{
	$username = $_POST['user_name'];
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"])) 
     {
	$loginquery ="SELECT * FROM signup WHERE email='$username' && password='$password' ";
	$result=mysqli_query($db, $loginquery);
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row))
								{
                                    	$_SESSION["user_id"] = $row['user_id'];
										 header("location:index.php");
	                            } 
							else
							    {
                                      	$message = "Invalid Username or Password!";
                                }
	 }
	
	
}





?>

<!DOCTYPE html>
<html>
  <head>
        <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="admin/assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="admin/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login" > 
        <div class="container" >
      
      <form class="form-signin" action='' method='post' >
        <h2 class="form-signin-heading" style="color:white;">Please sign in</h2>
        <input type="text" class="input-block-level" placeholder="Email address"  name="user_name">
        <input type="password" class="input-block-level" placeholder="Password"  name="password">
        <label class="checkbox" style="color:white;">
          <input type="checkbox" value="remember-me" > Remember me
        </label>
       
        <input name='submit' class="btn btn-large btn-primary" type="submit" value='sign in'>
		<center><?php echo  '<div style="color:red;"> '.$message.'</div>';?></center>
      </form>

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>