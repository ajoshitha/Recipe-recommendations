
<?php


	
	
if(isset($_POST['submit']))                  //if post btn is pressed
{   
											// getting current Date Time OOP way
						$currentDateTime = new \DateTime();

											//set timeZone
						$currentDateTime->setTimezone(new \DateTimeZone('Asia/kolkata'));
						$dateTime = $currentDateTime->format(' h:iA j-M-Y ');
		 
    
						
						$user_email = $_POST['email'];	
						$text = $_POST['comment'];   
						
        if( $user_email=='')
	          {
		                 $select_id="<h4><center>select your e-mail id first!</h4></center>";
						 
	          }
		 elseif(empty($text))
	          {
	             $textfield ="<h4><center>Please fill-out the Text fields first!</center></h4>";	
				}
			  
		else
	          {
	             
	             $sql = "INSERT INTO commentbar(user_id,text,date_time,recipy_id) VALUES ('$user_email','$text','$dateTime','$DISC')";
	             mysqli_query($db, $sql);
	
				}
	
	
	
}




?>

<?php
  error_reporting(0);
  
  echo "<div class='error-styling'>";

  echo $textfield;

  echo $select_id;
  echo "</div>";
?>




					
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>comments</h3>
					    <form action='' method='post'>
					    	<div>
						    	<span><label>E-MAIL</label></span>
						    	<span>
								<?php
			
		                     echo " <select name='email'>
							                  <option value=''><i>  ------- Choose E-mail ---------</i></option>";
							  
                               $sql = "SELECT * FROM signup WHERE user_id='" . $_SESSION["user_id"] . "'";
							   $result=mysqli_query($db, $sql);
							   while($row = mysqli_fetch_array($result))
								{
							        echo		"<option value=".$row['user_id'].">".$row['email']."</option>";
								}	
							        echo		"</select>";
?>	
								
								</span>
						    </div>
							 <div>
						    	<span><label>MESSAGE</label></span>
						    	<span><textarea name='comment'> </textarea></span>
						    </div>
						    
						   <div>
						   		<span><input type="submit" name='submit' value="Submit"></span>
						  </div>
					    </form>
				     </div>
  				</div>	
			
<?php			
					
		 $akl = "DELETE FROM commentbar WHERE id='$_GET[d]' && user_id='".$_SESSION["user_id"]."'";                //query to delete by 'id' which get from while loop
	mysqli_query($db,$akl);			
						     
						
		$sql = "select signup.* , commentbar.* from signup, commentbar where signup.user_id=commentbar.user_id  && recipy_id='$DISC' order by id desc";
						$result = mysqli_query($db, $sql);
						while($row = mysqli_fetch_array($result))
						{
							
							$fname =$row['firstname'];
									$date =$row['date_time'];
									$text =$row['text'];	

				
				
				echo '<div  style="background-color:#e6dfd1;height:100px;display:inline-block;border-radius:5px;margin:auto;margin-bottom:2px;">
				  
				  
				 <div style="display:inline-block;height:20px;background-color:;color:#000;width:80px;"><h3>'.$fname.'</h3></div>
				  <div style="display:inline-block;float:right;height:20px;background-color:;color:#000;width:120px;font-size:10px;">'.$date.'</div>
				  
				   <div style="display:inline-block;min-height:15px;margin-top:5px;background-color:;color:#000;width:535px;"><p>'.$text.'</p></div>
				    <div style="float:right;height:20px;background-color:;color:#000;width:auto;margin-top:5px;">
					
					
					<a href=fullrecipy.php?d='.$row['id'].'&DISC='.$DISC.' style="font-size:15px;margin-left:30px;" >Delete</a>
					
					
					</div>
				 
				  
  				</div>';
						}
	?>			