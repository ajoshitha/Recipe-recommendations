$(document).ready(function(){

	// Apply style based on ratings from database

	$('.5').html('<span class="glyphicon glyphicon-heart" rating="1"></span><span class="glyphicon glyphicon-heart" rating="2"></span><span class="glyphicon glyphicon-heart" rating="3"></span><span class="glyphicon glyphicon-heart" rating="4"></span><span class="glyphicon glyphicon-heart" rating="5"></span>');
		$('.4').html('<span class="glyphicon glyphicon-heart" rating="1"></span><span class="glyphicon glyphicon-heart" rating="2"></span><span class="glyphicon glyphicon-heart" rating="3"></span><span class="glyphicon glyphicon-heart" rating="4"></span><span class="glyphicon glyphicon-heart gray" rating="5"></span>');
			$('.3').html('<span class="glyphicon glyphicon-heart" rating="1"></span><span class="glyphicon glyphicon-heart" rating="2"></span><span class="glyphicon glyphicon-heart" rating="3"></span><span class="glyphicon glyphicon-heart gray" rating="4"></span><span class="glyphicon glyphicon-heart gray" rating="5"></span>');
				$('.2').html('<span class="glyphicon glyphicon-heart" rating="1"></span><span class="glyphicon glyphicon-heart" rating="2"></span><span class="glyphicon glyphicon-heart gray" rating="3"></span><span class="glyphicon glyphicon-heart gray" rating="4"></span><span class="glyphicon glyphicon-heart gray" rating="5"></span>');
					$('.1').html('<span class="glyphicon glyphicon-heart" rating="1"></span><span class="glyphicon glyphicon-heart gray" rating="2"></span><span class="glyphicon glyphicon-heart gray" rating="3"></span><span class="glyphicon glyphicon-heart gray" rating="4"></span><span class="glyphicon glyphicon-heart gray" rating="5"></span>');
						$('.0').html('<span class="glyphicon glyphicon-heart gray" rating="1"></span><span class="glyphicon glyphicon-heart gray" rating="2"></span><span class="glyphicon glyphicon-heart gray" rating="3"></span><span class="glyphicon glyphicon-heart gray" rating="4"></span><span class="glyphicon glyphicon-heart gray" rating="5"></span>');



	// Appy style on hover by user

	$("span[rating='1']").hover(function(){
		console.log("selected 1");
		$(this).addClass('red');
	 },function() {
        $( this ).removeClass('red');
     }
	);

	$("span[rating='2']").hover(function(){
		console.log("selected 1");
		$(this).prev().addClass('red');
		$(this).addClass('red');
	 },function() {
	 	$( this ).prev().removeClass('red');
        $( this ).removeClass('red');
     }
	);

	$("span[rating='3']").hover(function(){
		console.log("selected 1");
		$(this).prev().prev().addClass('red');
		$(this).prev().addClass('red');
		$(this).addClass('red');
	 },function() {
	 	$( this ).prev().prev().removeClass('red');
	 	$( this ).prev().removeClass('red');
        $( this ).removeClass('red');
        
     }
	);

	$("span[rating='4']").hover(function(){
		console.log("selected 1");
		$(this).prev().prev().prev().addClass('red');
		$(this).prev().prev().addClass('red');
		$(this).prev().addClass('red');
		$(this).addClass('red');
	 },function() {
	 	$( this ).prev().prev().prev().removeClass('red');
	 	$( this ).prev().prev().removeClass('red');
	 	$( this ).prev().removeClass('red');
        $( this ).removeClass('red');
        
     }
	);

	$("span[rating='5']").hover(function(){
		console.log("selected 1");
		$(this).prev().prev().prev().prev().addClass('red');
		$(this).prev().prev().prev().addClass('red');
		$(this).prev().prev().addClass('red');
		$(this).prev().addClass('red');
		$(this).addClass('red');
	 },function() {
	 	$( this ).prev().prev().prev().prev().removeClass('red');
	 	$( this ).prev().prev().prev().removeClass('red');
	 	$( this ).prev().prev().removeClass('red');
	 	$( this ).prev().removeClass('red');
        $( this ).removeClass('red');
        
     }
	);
	

	$('.glyphicon').click(function(){

		var rating = $(this).attr('rating');
        var id = $(this).parent().parent().attr('article-id');
		console.log(rating);
		console.log(id);

		$.ajax({
	      url: "rate.php",
	      type: 'GET',
	      data: {id : id,rating:rating},
	      success: function(data) {  
	      console.log(data); 
	      location.reload();
	  },
	  	  error: function(e) {
		 		 console.log(e); 
		}
	});
	})

});