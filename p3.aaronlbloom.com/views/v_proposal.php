<div id="wrapper">

	<div class="roundedbox">
		<div id="header" class="roundedbox">
				<b>Aaron L Bloom</b><br>
				CSCI E-75 - Dynamic Web Applications<br>
				Project 3 – Jscript / JQuery tool – Proposal. <br>
		</div>
<br>
<br>
<div   class="roundedbox">
	<div id="title"> Project title:  <u> ISBN Lookup / Conversion Tool</u></div>
	<br><br>
	<div id="title"> Description:</div>
	<br>
	I propose to write a web based ISBN lookup tool. ISBN, or International Standard Book Number, 
	is the standard identification code  used for books. A number of years ago the industry converted from using 10 digit ISBN’s to 13 digit EAN’s. 
	Many companies, stores , reports and data feeds still contain a mixture of 10 and 13 digit numbers however causing confusion. 
	A number of conversion tools have been written to convert a 10 digit number to its 13 digit equivalent, and vice versa to help tackle this. 
	As I work in IT in the book publishing industry such a conversion tool is quite handy. 
	I propose to write such a tool with both an online and batch upload functionality as well as the ability to provide metadata about titles using google book’s API. 
	Google provides the ability to pass the API an ISBN and returns a JSON output with metadata about that ISBN.
	JQuery has the ability to translate and write out JSON responses.  
	<br>
</div>
<div   class="roundedbox">
<div id="title"> UI Ideas:</div>
	<dl>
		<dt>One screen, a single input field (ie Google)</dt>
			<dd>User can enter into the input field a 10 digit ISBN, 13 digit EAN or even a 9 digit piece of a 10 digit ISBN (without the 10 digit check digit). </dd>
		<dt>A submit button</dd>
		<dt>If a valid entry is found clicking submit will show, below the input box, the following output display:</dd>
			<dd>ISBN 10 </dd>
			<dd>ISBN 13 (EAN)</dd>
			<dd>Title</dd>
			<dd>Author</dd>
			<dd>Possibly cover image?</dd>
			<dd>Description</dd>
			<dd>Publishing Company</dd>
			<dd>Batch Upload </dd>
			<dt>If possible I would like to provide users the ability to click an UPLOAD button, find a file on the clients PC, upload a list of ISBN’s (10 or 13) and produce an output file with the same information as shown on the screen, one record for each input title. I am unclear if this is something I can accomplish but will try.</dt>
	</dl>
<br>
</div>
<div   class="roundedbox">

<div id="title">Related Ideas:</div>
<br>
<dl>
<dt>Some examples of sites tackling this issue currently:</dt>
<dd>	<a href="http://isbn13converter.pearsoned.com/" Pearson ISBN converter</a></dd>
<dd>	<a href="http://www.isbn.org/converterpub.asp"> BISG ISBN converter</a></dd>
<dt>Tools:</dt>
<dd><a href="https://developers.google.com/books/docs/v1/using">Google Books API</a> </dd>
<dd><a href="http://api.jquery.com/jQuery.parseJSON/">JQuery JSON parsing</a></dd>
</dl>
</div>
</div>

