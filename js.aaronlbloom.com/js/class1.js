$(document).ready(function() {
	
	//alert("HELLO WORLD");
	
	// Vanilla JS:
	//document.gotElementById('lucy').style.backgroundColor="red";
	
	// Jqery equiv of above:
	//$ is a JQ selector. ID  write the name with # first. Class just use . first. Element just put the name
	$('#lucy').css('background-color','red');
	//	$('how to identify the element').css('what css element are we changing','what value are we changing it to');
	//alternatively if you do $('#lucy').css('background-color'); it will return the value currently set, in this case red, which can be used in js conditions
	
		$('#lucy').css('border','3px solid red');
		$('.ricardo').css('background-color','yellow');
	   // $('body').css('background-color','yellow');
	   //  $('div').css('background-color','green');
	   //	   $('div').css('display','none');
	//jquery function
	
	//When lucy is clicked, change border to blue:
	$('#lucy').click(function(){
		//putting a quick output to the console is a good way to make sure your function is 'wired' to the object properly
		//console.log("Lucy was clicked");
		
		$('#lucy').css('border','4px solid blue');
	
	});
//When lucy is clicke,d make Ricky wider
	$('#lucy').click(function(){
	
		//When lucy is clicked, change border to blue:
		$('#ricky').css('width','400px');
		
	});
	
	//When lucy is clicke,d make Ricky wider
	$('#lucy').hover(function(){
		//When lucy is clicked, change border to blue:
		$('#lucy').css('opacity','.5');		
	});


//some common jquery functions
// $('div').hide();
// $('div').show();
// $('div').toggle();



	
});