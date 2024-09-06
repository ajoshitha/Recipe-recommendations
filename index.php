<?php
include('connection/connect.php');

 session_start(); //session started by unique user_id
  
error_reporting(0);                                                                      //for printing the  text
  $sql = "SELECT * FROM signup where user_id='".$_SESSION["user_id"]."'";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($result);
  $name=$row['firstname'];

  if($_SESSION["user_id"]==0)
  {
	  $none='none';
  }

?>

<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Food &amp; Recipes Web Template</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="rating.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="rating.js"></script>
<script language="javascript" type="text/javascript">
$(function() {
    $("#rating_star").codexworld_rating_widget({
        starLength: '5',
        initialValue: '',
        callbackFunctionName: 'processRating',
        imageDirectory: 'images/',
        inputAttr: 'postID'
    });
});

function processRating(val, attrVal){
    $.ajax({
        type: 'POST',
        url: 'rating.php',
        data: 'postID='+attrVal+'&ratingPoints='+val,
        dataType: 'json',
        success : function(data) {
            if (data.status == 'ok') {
                alert('You have rated '+val+' to CodexWorld');
                $('#avgrat').text(data.average_rating);
                $('#totalrat').text(data.rating_number);
            }else{
                alert('Some problem occured, please try again.');
            }
        }
    });
}
</script>
<style type="text/css">
    .overall-rating{font-size: 14px;margin-top: 5px;color: #8e8d8d;}
</style>
</head>
<body>
	<div class="header">
		<div>
			<a href="index.php"><img src="images/app.png" alt="Logo"></a>
		</div>
	
		
	</div>
	<div  style="background-color:;margin:auto;min-height:20px;display:<?php echo $none;?>;">
	<div  style="background-color:;margin-left:200px;width:950px;min-height:30px;">
	<p style='float:left;color:#449c3a;margin-left:10px;font-size:20px;'>You successfully login!</p>
		<p style='float:right;color:#fff;margin-left:px;font-size:20px;'>Welcome:<span style='margin-right:0px;display:inline-block;margin-right:5px;'><?php echo $name ?></span>
			<image src='images/user.png'  style='display:inline-block;height:20px;width:20px;margin-top:5px;margin-right:5px;'/>
	</div>	
	</div>
	<div class="body">
	
		<div>
			<div class="header">
				<ul>
					<li class="current">
						<a href="index.php">Home</a>
					</li>
					<li>
						<a href="recipes.php">Recipes</a>
					</li>
					<li>
							<a href="featured.php">Recipe of Month</a>
					</li>
					
					<li>
						<a href="about.php">About</a>
					</li>
						<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li><a href="login.php">login</a></li>';
								echo '<li><a href="signup.php">signup</a></li>';
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
				<div>
					<a href="index.php"><img src="images/ghzfshLF.jpg" alt="Image"></a>
				</div>
				<ul>
					<li class="current">
						<a href="https://youtu.be/opo3HL856OQ?si=bA20C6F49AbarpS2log.php"><img src="images/eat.jpg" alt="Image"></a>
						<div>
							<h2><a href="https://youtu.be/opo3HL856OQ?si=bA20C6F49AbarpS2">Salad days</a></h2>
							<p>
								7 Healthy Salads Recipes
								
							</p>
						</div>
					</li>
					<li>
						<a href="https://youtu.be/r2_1oGuE1bw?si=4_UIopf6YY2ftsRr"><img src="images/khsVC.jpg" alt="Image"></a>
						<div>
							<h2><a href="https://youtu.be/r2_1oGuE1bw?si=4_UIopf6YY2ftsRr">Eat like a horse</a></h2>
							<p>
							      Protein Rich Recipes
							</p>
						</div>
					</li>
					<li>
						<a href="https://www.youtube.com/watch?v=vtwX4aFMiK8"><img src="images/dessert.jpg" alt="Image"></a>
						<div>
							<h2><a href="https://www.youtube.com/watch?v=vtwX4aFMiK8">Dessert</a></h2>
							<p>
								11 Quick-and-Easy Dessert Recipes
							</p>
						</div>
					</li>
				</ul>
			</div>
			<div class="footer">
				<ul>
				<li>
						<h2><a href="recipes.php"> Recipes</a></h2>
						<a href="recipes.php"><img src="images/gsdbxh.jpg" alt="Image"></a>
					</li>
					<li>
						<h2><a href="featured.php">Featured Recipes</a></h2>
						<a href="featured.php"><img src="images/featured.jpg" alt="Image"></a>
					</li>
					
				</ul>
				<ul>
					<li>
						<h2><a href="videos.php">Videos</a></h2>
						<a href="videos.php"><img src="images/rjfxn1.jpg" alt="Image"></a>
					</li>
					<li>
						<h2><a href="https://fsph.iupui.edu/doc/10-Tips-Healthy-Lifestyle.pdf">Healthy Tips</a></h2>
						<a href="https://fsph.iupui.edu/doc/10-Tips-Healthy-Lifestyle.pdf"><img src="images/hnt1.jpg" alt="Image"></a>
					</li>
				</ul>
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
						<a href="recipes.php"><img src="images/home1.jpg" alt="Image"></a>
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
			<div style="display:<?php echo $none;?>;">
				<h3>Settings</h3>
				<a href="#"  ><?php echo $logout;?></a>
				
				 
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