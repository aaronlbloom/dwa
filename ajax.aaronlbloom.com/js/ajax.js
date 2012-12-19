$(document).ready(function() {

						var  options = {
                        	type: 'POST',
                        	url: 'js/process.php',
                        	success: function(response) {
                        		   $('#results').html(response);
                        	}
                        	
                        };
                       
                          $('form').ajaxForm(options);
                           
					  $('#process-btn').click(function() {
                        
                        
                        $.ajax({
                                type: 'POST',
                                url: 'js/process.php',
                                success: function(response) { 
                                     // Load the results we get back from process.php into the results div
                                        $('#results').html(response);
                                },
                                data: {
                                          name: $('#name').val(),
                                },
                         }); // end Ajax setup
                                
                }); // end process-btn wiring
                                                
});
       