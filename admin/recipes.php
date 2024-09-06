
<?php
error_reporting(0);
include("../connection/connect.php");

 $sql = "DELETE FROM recipes WHERE rid='$_GET[id]'";                //query to delete by 'id' which get from while loop
mysqli_query($db,$sql);




 



if(isset($_POST['submit']))           //if upload btn is pressed
{
	
			
		$disc = $_POST['disc']; 
		
		  
		
		if(!$respname=''||!$disc==''||!$fnew=='')
		{	
										$sec= 	'<div class="alert alert-error alert-block">
													<a class="close" data-dismiss="alert" href="#">&times;</a>
													<h4 class="alert-heading">Error!</h4>
												All fields must be required
									
												</div>';
									
		
								
		}
	else
		{
		
								$fname = $_FILES['file']['name'];
								$temp = $_FILES['file']['tmp_name'];
								$fsize = $_FILES['file']['size'];
								$extension = explode('.',$fname);
								$extension = strtolower(end($extension));  
								$fnew = uniqid().'.'.$extension;
   
								$store = "img/".basename($fnew);                      // the path to store the upload image
	
					if($extension == 'jpg'||$extension == 'png'||$extension == 'gif' )
					{        
									if($fsize>=1000000)
										{
		
		
												$first= 	'<div class="alert alert-error alert-block">
															<a class="close" data-dismiss="alert" href="#">&times;</a>
															<h4 class="alert-heading">Error!</h4>
														Maximum upload size is 1Mb 
									
															</div>';
	   
										}		
									else
										{
												$respname = $_POST['recipyname'];
												  
												
												
												move_uploaded_file($temp, $store);
				
												$sql = "INSERT INTO recipes(rimage,resname,rtext) VALUES('$fnew','$respname','$disc')";  // store the submited data ino the database :images
												mysqli_query($db, $sql); 
	          
			  
												$q=	'<div class="alert alert-success">
													<button type="button" class="close" data-dismiss="alert">&times;</button>
														<h4>Success</h4>
															The Record Inserted successfully
							
													</div>';
                
			   
			
			
			 
					
				
	   
		
	
										}
					}
						
	    }



	
	
	

}




			


















?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Admin Home Page</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Admin Panel</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i>Saif Ali Akhtar <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="index.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                                <a href="#">Dashboard</a>
                            </li>
                          
                          
                            
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li >
                            <a href="dashboard.php"><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>
                        <li class="active">
                            <a href="recipes.php"><i class="icon-chevron-right"></i> Recipes</a>
                        </li>
                        <li>
                            <a href="detail.php"><i class="icon-chevron-right"></i>Detail Recipes</a>
                        </li>
						 <li >
                            <a href="users.php"><i class="icon-chevron-right"></i>users</a>
                        </li>
						<li>
                            <a href="comment.php"><i class="icon-chevron-right"></i>Comments</a>
                        </li>
                       
                    </ul>
                </div>
                
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
					
					  <?php 
				    echo  $first;
					 echo  $sec;
					 echo  $th;
					
					
				   
					echo   $q;
					 
				  
				  ?>
                        
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="#">Dashboard</a> <span class="divider">/</span>	
	                                    </li>
	                                    <li class="active">
	                                        <a href="#">Recipes</a>
	                                    </li>
	                                   
	                                    
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                    <div class="row-fluid">
					
					
					     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Recipes Table</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table class="table table-bordered">
						              <thead>
						                <tr>
						                   <th>recipe ID </th>
						                  <th>Image</th>
						                  <th>Recipe Name</th>
						                  <th>Discription</th>
										   <th>operation</th>
						                </tr>
						              </thead>
						              <tbody>
									  
	<?php                                                                          //for printing the  text
    
    $sql = "SELECT * FROM recipes ORDER BY rid DESC";
	 $result = mysqli_query($db, $sql);
while($row = mysqli_fetch_array($result))
{
	
       $rid =$row['rid'];
	    $rimage =$row['rimage'];
		 $rnames =$row['resname'];
		  $rtext =$row['rtext'];
		  
									echo	'<tr>';
						             echo    " <td>".$rid ."</td>";
						             echo     " <td>".$rimage ."</td>";
						             echo     " <td>".$rnames ."</td>";
						             echo    " <td>".$rtext ."</td>";
									echo	'   <td><a class="btn btn-danger" href=recipes.php?id='.$row['rid'].'><i class="icon-remove icon-white"></i> Delete</a></td>';
									
									
						              echo  '</tr>';
	   
}
?>								  
									  
									  
									  
									  
						                
						                
										
										
										
										
										
										
						              </tbody>
						            </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
					
					
					   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add a new Record</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								
                                    <form class="form-horizontal" action='' method='post'  enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>ADD Recipes  </legend>
										
										 <div class="control-group">
                                          <label class="control-label" for="fileInput"  >File input</label>
                                          <div class="controls">
										  
                                            <input class="input-file uniform_on" id="fileInput" type="file"  name="file" >
                                          
										  </div>
                                        </div>
										
                                        <div class="control-group">
                                          <label class="control-label" >Recipe Name </label>
                                          <div class="controls">
										  
                                            <input type="text"  name="recipyname" class="span6" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                                             
                                          </div>
                                        </div>
										
                                       
                                        <div class="control-group">
                                          <label class="control-label" for="textarea2">About Recipe</label>
                                          <div class="controls">
                                            <textarea class="input-xlarge textarea"  name='disc' placeholder="Enter text ..." style="width: 810px; height: 200px"></textarea>
                                          </div>
                                        </div>
										
										
                                        <div class="form-actions">
                                         <input type='submit' name='submit' value='Add New'class="btn btn-primary"/>
                                          <button type="reset" class="btn">Cancel</button>
                                        </div>
										
										
									
                                      </fieldset>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
                       
            </div>
            <hr>
            <footer>
                <p>&copy; Admin 2024</p>
            </footer>
        </div>
       
		
		 <!--/.fluid-container-->
        <link href="vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="vendors/chosen.min.css" rel="stylesheet" media="screen">

        <link href="vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

        <script src="vendors/jquery-1.9.1.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/jquery.uniform.min.js"></script>
        <script src="vendors/chosen.jquery.min.js"></script>
        <script src="vendors/bootstrap-datepicker.js"></script>

        <script src="vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
        <script src="vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

        <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

	<script type="text/javascript" src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
	<script src="assets/form-validation.js"></script>
        
	<script src="assets/scripts.js"></script>
        <script>

	jQuery(document).ready(function() {   
	   FormValidation.init();
	});
	

        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>
		
    </body>

</html>