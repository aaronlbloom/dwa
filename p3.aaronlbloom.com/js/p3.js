$(document).ready(function(){ 
	
//Handle user clicking back button after going to google or amazon link. If you click back the ISBN will still be populated in the input form field, reload the page.	
if($('#i_isbn').val()){
	check_input();
}	 
//If the users clicks enter while in the input field, trigger the lookup		    	  
$('#i_isbn').keydown(function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){
		check_input();
		}
});

//If the users clicks submit, trigger the lookup 	 
$('#submitButton').click(function() { 	
 	check_input();
  });

//Main controller type js function to handle grabbing the input value, validating it is a real ISBN and either returning an 
// error message or calling the function to perform the API call if it's valid 
function check_input(){
	    $( "#helpBox" ).css("visibility","hidden");
 	 	$("#content").html("<div>Checking...</div>");
 	 	$input_isbn=$('#i_isbn').val();
 	 	var $results = new Array();
 	 	$results =  validate_isbn($input_isbn);
 	 	
   		if($results[2]){
   			//A Valid ISBN was found, proceed:
   			
   			 get_book_info($input_isbn,'main');  
   			  
		}else{
  			//A Valid ISBN was not found, push error message to the screen
			  $(".content").html("");
		      $("#bottom").html("<div>"+ $results[3] + "</div>");
	     }	  
		   
  			
  } 	

//Validate the actual ISBN contents to ensure what was entered is valid ISBN10 or ISBN13
// Return useful error messages if users has not entered a valid input to push back onto the page 	
function validate_isbn($input_isbn){
	
	var $results = new Array();

   	$results[0]= "";
	$results[1]= "";
	$results[2]= false;
	$results[3]= "";
    
    $results = convertISBN($input_isbn);
    
    return $results;
     
}  

//API call to google books to get information about input ISBN and start throwing data onto the screen:
function get_book_info($input,$type){
 	      
 	      //Use of an input 'type' is so i can call this same function multiple times for different reasons.   
 	      
 	      // Addition of the &callback=? at the end of the url call handles the json request as a jsonp request 
 	      // to allow for jsonp cross domain calls, allowing this to work in IE
 	      
		  if($type=="main"){//Main call to populate entered ISBN's data onto the main screen
		  	$url = 'https://www.googleapis.com/books/v1/volumes?q=:isbn=' + $input + '&callback=?';
		  }else if($type=="title"){//Call to lookup 'related' item's based on the title of the book
		  	$url = 'https://www.googleapis.com/books/v1/volumes?q=:title=' + $input + '&maxResults=40&callback=?';
		  }else if($type=="authors"){//Call to lookup 'related' items based on the author
		  	$url = 'https://www.googleapis.com/books/v1/volumes?q=:authors=' + $input + '&maxResults=40&callback=?';
		  }
			/*$.ajaxSetup({
  				"error":function() {   
    			alert('Error!');
    		
			}});*/
			
			 //Perfor Jquery JSON call to get the data			  
		  	var jsonr =  $.getJSON($url,function(data){

		  	 	 
       
		    	 
		    	//Set 'found' flag, if not set a later else will throw a no records found message onto the screen
		    	$found = false;
		        
		        //Reset variables
		        var $book	  = new Array();
		    	  $book[1]	  = new Array();//Header
		       	  $book[2]	  = new Array();//Data
		    	  $book[3]	  = new Array();//Position
		 		
		 		var $i_isbn10    = new String();
		 		var $i_isbn13    = new String();
		 		var $i_authors   = new String();
		 		var $i_title     = new String();
		 		var $i_publisher = new String();
		 		var $i_pubdate 	 = new String();
		 		var $i_price 	 = new String();
		 		
		 		var $i_pages	 = new String();
		 		var $i_descr     = new String();
		 		var $i_thumbnail = new String();
		 		var $i_link      = new String();
 
 				//For each result
		        $.each(data.items, function(index, item){
		        
		        
		        //Reset variables to blank each iteration. 
		        //If I dont do this should a particular result NOT include one of the json value's the try/catch will fail and the variable will be set with the prior records values still
		        $i_isbn10    = " ";
				$i_isbn13    = " ";
				$i_authors   = " ";
				$i_title     = " ";
				$i_publisher = " ";
				$i_pubdate 	 = " ";
				$i_price     = " ";
				$i_pages	 = " ";
				$i_descr     = " ";
				$i_thumbnail = " ";
				$i_link	     = " ";
				
				//The Try/Catch prevents the query from failing should the specific tree element not be present in the results. 
				//The if() statement within the try/catch prevents 'undefined' from being returned for results where the node is present but no value
			 
		        try {
		        	if((item.volumeInfo.industryIdentifiers[0].identifier)){
		    		 		if((item.volumeInfo.industryIdentifiers[0].type=="ISBN_10")){
		    		 			//sometimes an identifier other than isbn10 or 13 is presented. Only grab 10/13. 
		    		 			$i_isbn10 = item.volumeInfo.industryIdentifiers[0].identifier; 
		    		 		}
  				 	}
  				}catch(e){}
		        try {
		        	if((item.volumeInfo.industryIdentifiers[1].identifier) ){
		        		if((item.volumeInfo.industryIdentifiers[1].type=="ISBN_13")){
  				 			$i_isbn13 =  item.volumeInfo.industryIdentifiers[1].identifier;
  				 		}
  				 	}
  				}catch(e){}
  				try {
  					if(item.volumeInfo.title){
  				 		$i_title = item.volumeInfo.title;
  				 	}
  				}catch(e){}
  				try {
  					if(item.volumeInfo.authors[0]){
  				 		$i_authors = item.volumeInfo.authors[0];
  				 	}
  				}catch(e){}
  				
  				try {
  					if(item.volumeInfo.publisher){
  				 		$i_publisher = item.volumeInfo.publisher;
  				 	}
  				}catch(e){}
  				try {
  					if(item.volumeInfo.publishedDate){
  				 		$i_pubdate = item.volumeInfo.publishedDate;
  				 	}
  				}catch(e){}
  				 try {
  				  	if(item.saleInfo.listPrice.amount){
  				 		$i_price = "$" +  item.saleInfo.listPrice.amount;
  				  	}else{
  				  		if(item.saleInfo.retailPrice.amount){
  				 			$i_price = "$" +  item.retail.listPrice.amount;
  				  		}
  				  	}
  				  }catch(e){}
  				try {
  					if(item.volumeInfo.pageCount){
  				 		$i_pages = item.volumeInfo.pageCount;
  				 	}
  				}catch(e){}
  				try {
  					if(item.volumeInfo.description){
  				 		$i_descr = item.volumeInfo.description;
  				 	}
  				}catch(e){}
  				try {
  					if(item.volumeInfo.imageLinks.thumbnail){
  				 		$i_thumbnail =  item.volumeInfo.imageLinks.thumbnail ;
  				 	}
  				}catch(e){}
		         try {
  					if(item.volumeInfo.infoLink){
  				 		$i_link =  item.volumeInfo.infoLink ;
  				 	}
  				}catch(e){}
		          
		       
		      
		            //Each google call will return more than I want, unrelated books (or related based on different criteria than mine)
		            //This filter's out the books I dont want to capture based on the input critiera
		            
		        	if(($type=="main" & (($input.toUpperCase()==$i_isbn10)||($input==$i_isbn13)))
		             ||($type=="title" & (($input.toUpperCase()==$i_title.toUpperCase() )))
		             ||($type=="authors" & (($input==$i_authors)))
		        	
		        	)
		        	{
				        		//Reset the contents of the main page
		     	         		if($type=="main"){
		     	         			$(".content").html(""); //Reset the content class section of the screen prior to populate with good data
				         		}
				          
				     		//Push captured elements, their 'caption/column' name and their position on the page into an object to pass to other functions.
						 	i = 0;
							$book[1][i]	   = "Title";
							$book[2][i]	   = $i_title;
							$book[3][i]	   = "left";
							i++;
							$book[1][i] 	= "Author";
							$book[2][i]   	= $i_authors;
							$book[3][i] 	= "left";
							i++;
							
							$book[1][i] 	= "ISBN 10";
							$book[2][i]   	= $i_isbn10
							$book[3][i] 	= "left";
							i++;
							$book[1][i] 	= "ISBN 13";
							$book[2][i]   	= $i_isbn13 
							$book[3][i] 	= "left";
							i++;
							$book[1][i] 	= "Publisher";
							$book[2][i]   	= $i_publisher;
							$book[3][i] 	= "left";
							i++;
							$book[1][i] 	= "Pub Date";
							$book[2][i] 	= $i_pubdate;
							$book[3][i] 	= "left";
							i++;
							$book[1][i] 	= "Price";
							$book[2][i] 	= $i_price;
							$book[3][i] 	= "left";
							i++;
							$book[1][i] 	= "Pages";
							$book[2][i]  	= $i_pages;
							$book[3][i] 	= "left";
							i++;
							$book[1][i] 	= "Link";
							//sometimes a valid ISBN10 is not returned so the links will not be valid, do not show links in this case:
							if($i_isbn10==" "){
								$book[2][i]  	= " ";							
							}else{
								$book[2][i]  	= "<a href='" + $i_link + "'>Google</a>";
							}
							$book[3][i] 	= "left";
							i++;
							$book[1][i] 	= "Link";
							if($i_isbn10==" "){
								$book[2][i]  	= "";
								
							}else{
								$book[2][i]  	= "<a href='http://amzn.com/" +$i_isbn10 + "'>Amazon</a>";
							}
							$book[3][i] 	= "left";
							i++;
							$book[1][i]	 	= "Description";
							$book[2][i]   	= $i_descr;
							$book[3][i] 	= "bottom";
							i++;
							$book[1][i]	= "";
							$book[2][i]  	= "<img src='" + $i_thumbnail + "'>";
							$book[3][i]	= "right";
		  				    $found = true;  
		 				//Populate values onto the screen. I HAVE to do this within the json/each function because it is an async request. If I try and pull this out into another 
		 				// function the screen could complete populating before all the results return. This is how JQuery performs async ajax requests. I found it annoying for my purposes, but understand it's reasoning.
		 				
		 				if($type=='main'){
		 					//Populates the main portion of the page
		 					populate_main($book); 
		 					//get_author_info($i_authors);
		 					//creates a table that will be filled in with a list of related items for a popup 
		 					$("#myTable").append('<table>')
			 			 	$("#myTable").append('<thead><tr>')
								  for (var i=0;i<$book[2].length;i++)
									{  
										if($book[3][i]=="left"){
			 					 			$("#myTable").append("<th>" + $book[1][i]+ "</th>");
			 							}
			 						}
				 			 $("#myTable").append("</tr></thead>");
				 			 
				 			 //Call this same function again to loop through and get information on related titles to populate the table we just started.
		 				     get_book_info($i_title,"title")
		 				     get_book_info($i_authors,"authors")
		 				     
		 				     //Close the related table
		 				  	 $("#myTable").append('</table>');    
						}else{
							//This is the section that will ACTUALLY populate the books section of the table on the recursive call
				 				  populate_list($book); 	  		     	   
						}		              			           
				    }			       
		        });
		        
		       //If nothing found in the main call push an error message to the screen
		       if(($type=='main')&(!$found)){
 		      	  $(".content").html("");
		        $("#bottom").html("<div>Record <span id='warning'>" + $input_isbn + "</span> not found, please try again</div>");
		      }
	
		    }  
		  
		 ); //close getJson call
			
 		  	 	
//jsonr.success(function() { alert("second success"); })
jsonr.error(function() { alert("Error! Status: " + jsonr.status + ", Error Message: " + jsonr.statusText); })
// jsonr.complete(function() { alert("complete"); });
 	 
 	}
 	//Populate the main page
 	function populate_main($book){
 					 for (var i=0;i<$book[2].length;i++)
					{ 
 	 
 					 $("#" + $book[3][i]).append("<div class='output_header'>" + $book[1][i]+ "</div>");
		         	 $("#" + $book[3][i]).append("<div class='output'> "+$book[2][i]+"</div><br>");
		         	 
		      	  }    
		      	      $("#left").append("<div class='output_header'>Related: </div>"); 
		      	      $("#left").append("<div class='output'> <a href='#' id='opener'>Click for related books</a></div><br>");
		       
  	}
  	//Populate the related items list table
  	function populate_list($book){		
 			
 			
 				 
  			$("#myTable").append("<tr>");
  			for (var i=0;i<$book[2].length;i++)
				{ 
					if($book[3][i]=="left"){
						 if($book[1][i]=="ISBN 10"){
						 	 $("#myTable").append("<td><a href='#' class='newBook' >" + $book[2][i]+ "</a></td>");
						 }else{
	 					 	$("#myTable").append("<td>" + $book[2][i]+ "</td>");
	 					 }
 					}
 				}
 	 
	 		$("#myTable").append("</tr>");		            
 }
 	
	$(function() {
		$( "input[type=submit], a, button" )
			.button()
			.click(function( event ) {
				event.preventDefault();
			});
	});
	//JQuery for opening and closing dialog box related table is contained in.
	$.fx.speeds._default = 1000;
	$(function() {
        $( "#myTable" ).dialog({
            autoOpen: false,
            show: "blind",
            hide: "explode",
           
            closeText: '__' ,
            width:"1200px"
            
            
        });

	  //JQuery for opening the dialog box when the related items link is clicked. 
	  //Use of the 'live' click method allows me to insert the 'opener' id element into the page dynamically.  
      $("#opener").live("click",function() {
            $( "#myTable" ).dialog( "open" );
            return false;
        });
    });
    //When the 'help' link is clicked a new box appears at the bottom providing help on how to use the screen
      $("#helpLink").click(function() {
      	  if($( "#helpBox" ).css("visibility")=="visible"){
      	  	  $( "#helpBox" ).css("visibility","hidden");
      	  }else{
      	  	  $( "#helpBox" ).css("visibility","visible");
      	  }
          
            return false;
        });
    
 
 	 //useing live function to allow click listener to work on dynamically created elements
 	 $(".newBook").live("click",function(){ 	 	
 	 	 	  $this_isbn = $(this).text();
 	 	 	  //Clear existing content and close popup window
 	 	 	  $(".content").html("");
 	 	 	  $( "#myTable" ).dialog( "close" );
  
 	 	 	   //Pass clicked ISBN back to the main routine
	   	  	   get_book_info($this_isbn,'main');  
 	 	 	return false;
 	 });
 		
 	/* 
 
 * I attempted to provide a WikiPedia infobox for author information. 
 * I succesfully wrote a function to retrieve the infobox data but stumbled when attempting to push that data onto the page. 
 * To push the data to the page in a meaningful way apparantly requires implementing a Template, which I did not have the time to learn how to do for this project .
 * 
 * I left this code in here commented out in case I wished to pursue this further in future. 
 */
/*
function get_author_info($input){
 		
		$input = $input.replace(" ", "_");
		console.log("author name:" + $input);	
	    $url = 'http://en.wikipedia.org/w/api.php?action=query&prop=revisions&rvprop=timestamp|user|comment|content&titles=' + $input + '&format=json&callback=?';
	  
		 $.getJSON($url, function(data) {   
		 //	 console.log(data);
    
		    for (var pageId in data.query.pages) {
			    if (data.query.pages.hasOwnProperty(pageId)) {
			    	//console.log(pageId);
			        //console.log(data.query.pages[pageId].revisions[0]['*']);
			          $("#authorInfo").html(data.query.pages[pageId].revisions[0]['*']);
			     }
			}
 
		}); 
}
*/
 
 	 		 
 }); 
 // end doc ready; do not delete this!