$(document).ready(function() { // start doc ready; do not delete this!
		$('.color-choice').click(function(){
			
			//use 'this', which refers to the object that called this function
			var color_that_was_chosen = $(this).css('background-color');
			
			//$('#canvas').css('background-color','yellow')
			$('#canvas').css('background-color',color_that_was_chosen)
			$('.texture-choice').css('background-color',color_that_was_chosen)
			
			//or you can do both at the same time!:
			//$('#canvas','.texture-choice').css('background-color',color_that_was_chosen)	
				
		});
		
		$('.texture-choice').click(function(){
			var image_that_was_chosen = $(this).css('background-image');			
			$('#canvas').css('background-image',image_that_was_chosen)	
		});
		//you can get inputs with a specific name, if you don't have a class name 
		$('input[name=message]').click(function(){
			
			//gets the value of the element chosen:
			var message_that_was_chosen = $(this).val();	
			
			//.html allows you to apppend html into an element
			// if the element is a div, it will inject it within the <div>start/end tags
			$('#message').html(message_that_was_chosen);	
			
		});
		
		$('#recipient').keyup(function(){
			
			//gets the value of the element chosen:
			var recipient = $(this).val();	
			var length = recipient.length;
			var char_left = 10-length;
			$('#recipient-output').html(recipient);	
			$('#characters-left').html(char_left);	
			if(char_left <= 3){
				$('#characters-left').css('color','orange')	
			}
			if(char_left == 0 ){
				$('#characters-left').css('color','red')	
			}
			if(char_left >3  ){
				$('#characters-left').css('color','green')	
			}

		});
		
			$('.graphic-choice').click(function(){
 			
 			var image = $(this).attr('src');
 			//console.log(image);
 			var full_image = "<img class='draggable' src='" + image + "'>";
 			$('#canvas').prepend(full_image);	
 			$( ".draggable" ).draggable({containment:"parent"});
		});	
			
	
	$(function() {
		$( "#progressbar" ).progressbar({
			value: 59
		});
	});
		 
}); // end doc ready; do not delete this!