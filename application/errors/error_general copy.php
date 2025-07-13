<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Error 500</title>
<link href="http://richiescamp.com/image/favicon.png" rel="shortcut icon" />
<style type="text/css">
	body
	{
		 font-family: "Arial", Helvetica Neue, Helvetica, sans-serif;
		 border:none;
		 outline:none;
	}
	
	.center
	{
		margin:140px auto 0px auto;
		width:500px;
		min-height:100px;
		padding:12px;
	}
	
	div.error
	{
		margin:12px auto 12px auto;
		width:280px;
	}
	
	.error_text
	{
		margin:6px auto 6px auto;
		padding:10px;
		font-size:15pt;
		text-align:center;
		text-transform:uppercase;
		font-weight:bold;
		font-style:italic;
		color:#EE0249;
		text-shadow:0 0 6px white;
		border-bottom:thin solid silver;
	}
	
	.error_link
	{
		text-align:center;
	}
	
	.link
	{
		text-decoration:none;
		color:black;
	}
	
	.icon
	{
		opacity:0.85;
		transition:all 360ms;
		-moz-transition:all 360ms;
		-o-transition:all 360ms;
		-webkit-transition:all 360ms;
		-ms-transition:all 360ms;
		cursor:pointer;
	}
	
	.icon:hover
	{
		opacity:1.2;
	}
	
	.link:hover
	{
		text-decoration:underline;
	}
</style>
</head>
<body>
	<div class="center"> 
    	<div class="error">
        	<a href="http://localhost/conculta">
        		<img class="icon" src="http://localhost/conculta/images/logo-dark.png" width="300px" height="70px" />
            </a>
        </div>
		<div class="error_text">
        	Sorry, error occur on server.
        </div>
        <div class="error_link">
            <a class="link" style="font-size:11pt;cursor:pointer" onClick="window.history.back();">Go to Previous Page</a>&nbsp; | &nbsp;<a class="link" style="font-size:11pt" href="http://localhost/conculta">Go to Home Page</a>
        </div>
    </div>
</body>
</html>