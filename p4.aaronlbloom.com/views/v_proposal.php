<div id="wrapper">

	<div class="roundedbox">
		<div id="header" class="roundedbox">
				<b>Aaron L Bloom</b><br>
				CSCI E-75 - Dynamic Web Applications<br>
				Project 4 – Requirements Document – Proposal. <br>
		</div>
<br>
<br>
<div   class="roundedbox">
	<div id="title"> Project title:  <u> Requirements Documentation</u></div>
	<br><br>
	<div id="title"> Description:</div>
	<br>
	As part of my job as an IT Business Analyst I write business requirements documentation used for business user signoff, development and QA.
	Traditionally these are written in Microsoft Word and uploaded as an attachment to our defect/request management system <a href="http://www.atlassian.com/software/jira/overview/">Jira</a>. <br> <br>
	My goal is to write a web based app where standard requirement's fields can be captured, stored and exported or reported on. A web UI can be used to capture the requirements, 
	JavaScript can be used to add/remove necessary components to each 'document' on the fly, and tasks and users can be stored and reported on from the local db.
    <br><br>
	There are many large software packages on the market that provide similar functionality but most are larger and more complicated than I need - and at a price. 
	My goal is to write a system custom to bare bones needs. 
	<br><br>
	As an extended goal, if I have time and ability, I would like to provide the ability to optionally link a document with a Jira ticket number and use Jira's API to pull status and other reporting into my app. Jira has an <A href="http://docs.atlassian.com/jira/REST/latest/#id251629">open API </a> which provides a JSON response to a request made against a given ticket.
	<br><br>

	
	<br>
</div>
<div   class="roundedbox">
<div id="title"> UI Ideas:</div>
	<dl>
		<dt>Login / Signup screen</dt><br>
			<dd>Main screen similar to our p2 twitter app allowing users to sign in or register</dd><br>
		<dt>Task List screen</dt><br>
			<dd>Once Logged in a user would view a list of tasks they have created </dd><br>
			<dd>A user could click a task to access the details</dd><br>
		<dt>Task List detail</dt><br>
			<dd>This screen would provide access to view/update/add requirements for a given task</dd><br>
			<dd>A 'task' can be defined from the UI based on a drop down of predefined data as a task, project, report, screen etc...</dd><br>
			<dd>There would be a static section with required values at the top, such as inputs for task name and assoicated business users</dd><br>
			<dd>There would be a dynamic section where users could add one or more 'sections' to the task, as needed based on predefined section 'types' such as description, requiremnets, assumptions, logic, pseudo code etc... </dd><br>
			<dd>Ideally there would be a way to import screenshots or other external file types into the app, this may not be possible for the scope of this project however</dd><br>
			<dd>Export / Print - A nicely formatted screen would be provided for printing</dd><br>
			<dd>Status - If a Jira ticket number is provided for this task/project a box would be provided near the top showing the status and other possible values pulled from Jira</dd><br>
			<dd>Audit - An Audit log would be kept of change date/user and optional comment for each task/project</dd>	<br>
	</dl>

<br>
</div>
<div   class="roundedbox">
<div id="title"> Scetch:</div><br>
Below is a screenshot of a sample / dummy requirements document template the 'Task List Detail' section would be based on.<br><br>
	<img src="/img/p4_proposal.jpg" width="700px" height="700px" />
<br>
</div>
<div   class="roundedbox">

<div id="title">Related Ideas:</div>
<br>
<dl>
<dt>Some applications that do requirements management:</dt>
<dd>	<a href="https://www.polarion.com/products/requirements/index.php/">	Polarion Requirements</a></dd>
<dd>	<a href="http://www.jamasoftware.com">Contour</a></dd>
<dt>JIRA API:</dt>
<dd><a href="http://docs.atlassian.com/jira/REST/latest/#id289052">Jira API</a> </dd>
<dd><a href="https://jira.atlassian.com/browse/JRA-9">Sample Jira Request</a></dd>
<dd><a href="https://jira.atlassian.com/rest/api/latest/issue/JRA-9">Sample Jira JSON response</a></dd>


</dl>
</div>
</div>

