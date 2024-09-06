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
	<title>Recipy of month</title>
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
					<li class="current">
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
				<div id="content">
					<div>
						<div>
							<h3>Sprouts Salad</h3>
							<p>
							Fresh, vibrant, and nutritious - indulge in our tantalizing sprouts salad for a burst of flavor and health in every bite. Elevate your palate with the crispness of mixed sprouts, juicy tomatoes, and refreshing cucumber, all delicately seasoned for a satisfying crunch. Savor the goodness of nature's bounty, crafted into a delightful salad that's as wholesome as it is delicious.
							
							</p>
							<a href="index.php"><img src="images/afskvxn.jpg" alt="Image"></a>
							<p>
								<h3>INGREDIENTS</h3><br/>

<li>1 cup mixed sprouts (such as mung bean, chickpea, lentil)</li><li>
1 medium-sized cucumber, diced</li><li>
1 medium-sized tomato, diced</li><li>
1 small red onion, finely chopped</li><li>
1 green chili (optional), finely chopped</li><li>
2 tablespoons fresh cilantro (coriander), chopped</li><li>
Juice of 1 lemon</li><li>
Salt to taste</li><li>
Black pepper to taste</li><li>
1 tablespoon olive oil (optional)</li>
							</p>
							<p>
								<br><h3>DIRECTIONS</h3><br>
								<b>Prepare the Sprouts:</b> Rinse the mixed sprouts thoroughly under running water. If you're using whole beans, you may need to soak them overnight before sprouting. Once rinsed, drain the water and let the sprouts sit in a colander for a few minutes to remove excess water.

<br><b>Combine Ingredients:</b> In a large mixing bowl, combine the mixed sprouts, diced cucumber, diced tomato, finely chopped red onion, chopped green chili (if using), and fresh cilantro.

<br><b>Seasoning:</b> Squeeze the juice of one lemon over the salad. Add salt and black pepper to taste. If desired, drizzle olive oil over the salad for added flavor.

<br><b>Toss Well:</b> Gently toss all the ingredients together until everything is evenly distributed and coated with the lemon juice and seasonings.

<br><b>Chill (Optional):</b> You can chill the salad in the refrigerator for about 30 minutes before serving if you prefer it cold.

<br><b>Serve:</b> Once chilled (if desired), transfer the sprouts salad to a serving dish and garnish with additional cilantro leaves if desired.

 <br>Serve your refreshing sprouts salad as a light and healthy appetizer or as a side dish with your favorite main course.
 <br><h3>Nutrient values</h3><br>
<li>Calories: 120-150 kcal</li><li>
Protein: 6-8 grams</li><li>
Carbohydrates: 15-20 grams</li><li>
Dietary Fiber: 4-6 grams</li><li>
Fat: 5-7 grams</li><li>
Vitamin C: 20-30% of daily value</li><li>
Vitamin A: 10-15% of daily value</li><li>
Iron: 10-15% of daily value</li><li>
Calcium: 4-6% of daily value</li>
							</p>
						</div>
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
				<h3>Wholesome Eats</h3>
				<ul id="blog">
					<li>
						<a href="https://youtu.be/uXlPsKqtfUU?si=LsfHD3xZ4-8cJ4ua">Click here <br> Rise and Blend: Fuel Your Day with Morning Smoothies!</a>
						
					</li>
					<li>
						<a href="https://youtu.be/97K4oOfmOfA?si=_3sJYRwRqwTPl7n5">Click here <br> Sip Smart, Live Vibrantly: Indulge in Healthy Cocktails!</a>
						
					</li>
					<li>
						<a href="https://youtu.be/rvULBQuK5Xs?si=MjVzTZAInZc9jGKN">Click here <br> Power Packed Rotis: Fueling Your Body, One Bite at a Time!</a>
						
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