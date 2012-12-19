$(document).ready(function(){ 
	 
	    $(".addLine").live("click",function(){ 	 	
	 			  $name = $(this).attr('id');  
	 			  //console.log("foo");
	 	 	 	  $html = "<input type='hidden'  name='new_detail_type[]' value='"+$name+"'></input><div class='output_header'>&nbsp;</div><div class='output'> <textarea type='text' name='new_detail_descr[]'></textarea></div><br>"
				  $("."+$name+"").append($html );
							   	  	  
	 	 	 	return false;
	 	 });
	 	 
	 	  $("#addSection").live("change",function(){ 	 	
	 			 $value = $(this).attr('value');
	 			 if($value!=0){
		 			 console.log($value);  
		 	 	 	 
		 	 	 	 $html =  "<div class='roundedbox'>";
					 $html += 	"<div class='output_header'>" + $value + ": <br><br></div>";
					 $html += 	"<input type='hidden'  name='new_detail_type[]' value='" + $value + "'></input>";
					 $html += 	"<div class='output_header'>&nbsp;</div>";
			         $html += 	"<div class='output'> <textarea type='text' name='new_detail_descr[]'></textarea></div>";
					 $html += 	"<br>";
					 $html +=   "<div class=" + $value + " id=" + $value + "></div>";
					 $html += 	"<input class='addLine' type='button' name='123' id='" + $value + "' value='Add a Line'>";
					 $html += "</div>";
					 
					 $("#newSection").append($html );
					//console.log("foo");	
				}		   	  	  
	 	 	 	return false;
	 	 });
	 	 
	 	 $(".delete").live("click",function(){ 	 	
	 			 
	 			 
	 			answer = confirm ("Are you sure?")
				if (answer){
				    return true;
				}else{
				    return false;
				};

	 	 	 	 
			 
	 	 });
	 	 

 }); 