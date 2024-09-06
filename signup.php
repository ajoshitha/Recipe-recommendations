<?php
include("connection/connect.php");
  

if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];	
	$password=$_POST['password'];
			
			
			
	$sql = "INSERT INTO signup(firstname,lastname,email,password) VALUES('$fname','$lname','$email','$password')";
	 $query=mysqli_query($db, $sql);
	if($query)
	{
		header('location:signup_success.php');
	}
	
	

}
 

?>

<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>signup</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header">
		<div>
			<a href="index.php"><img src="images/app.png" alt="Logo"></a>
		</div>
		
	</div>
	<div class="body">
		<div>
			<div class="header">
				<ul>
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>
						<a href="recipes.php">Recipes</a>
					</li>
					<li>
						<a href="featured.php">Recipe of Month</a>
					</li>
					
					<li class="">
						<a href="about.php">About</a>
					</li>
					<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li><a href="login.php">login</a></li>';
								echo '<li class="current"> <a href="signup.php">signup</a></li>';
							}
						else
							{
									
									
									
									$logout= '<form action="login.php" method="post" >
									<input type="submit" id="logout" name="logout" value="logout" style="width:100px;color:#000;border:none;padding:5px;font-size:15px;"  ></form>';
							}

						?>
					
				</ul>
			</div>
			<div class="body">
				<div id="content">
					<div>
							<center><h3>Sign up</h3></center>
					    <form action='' method='post'>
					    	<div>
						    	<span><label>FIRST-NAME</label></span>
						    	<span><input type="text" value="" name='fname'></span>
						    </div>
							<div>
						    	<span><label>LAST-NAME</label></span>
						    	<span><input type="text" value="" name='lname'></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text" value="" name='email'></span>
						    </div>
						    <div>
						     	<span><label>PASSWORD</label></span>
						    	<span><input type="text" value="" name='password'></span>
						    </div>
						    
						   <div>
						   		<span><input type="submit" name='submit' value="Submit"></span>
						  </div>
					    </form>
						
					</div>
				</div>
			</div>
		</div>
		<div>
			<div>
				<h3>Cooking Video</h3>
				<a href="videos.php"><img src="images/cooking-video.png" alt="Image"></a>
				<span>Indulge in timeless taste</span>
			</div>
			<div>
				<h3>Featured Recipes</h3>
				<ul id="featured">
					<li>
						<a href="recipes.php"><img src="images/sandwich.jpg" alt="Image"></a>
						<div>
							<h2><a href="recipes.php">Delicious Sandwich Delight</a></h2>
							
						</div>
					</li>
					<li>
						<a href="recipes.php"><img src="images/biscuit-and-coffee.jpg" alt="Image"></a>
						<div>
							<h2><a href="recipes.php">Homemade Biscuits</a></h2>
							
						</div>
					</li>
					<li>
						<a href="recipes.php"><img src="images/pizza.jpg" alt="Image"></a>
						<div>
							<h2><a href="recipes.php">Delicious Pizza</a></h2>
							
						</div>
					</li>
				</ul>
			</div>
			
			<div>
				<h3>Get Updates</h3>
				<a href="https://www.facebook.com/HomeCookingShow/" target="_blank" id="facebook">Facebook</a>
				<a href="https://twitter.com/nytcooking/" target="_blank" id="twitter">Twitter</a>
				<a href="https://www.youtube.com/@CookingWithChefAshok/" target="_blank" id="youtube">Youtube</a>
				<a href="http://freewebsitetemplates.com/go/flickr/" target="_blank" id="flickr">Flickr</a>
				<a href="https://www.hindustantimes.com/lifestyle/recipe/" target="_blank" id="googleplus">Google&#43;</a>
			</div>
			
		</div>
	</div>
	<div class="footer">
		<div>
			<p>
				&copy; Copyright 2024. All rights reserved
			</p>
		</div>
	</div>
</body>
</html>