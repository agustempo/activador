<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
</head>
<style type="text/css">

	@media (min-width: 760px) {

	}

	* {
		box-sizing: border-box;
	}
	
	.header { 
		background-color: grey;
		margin-bottom: 1rem;
	}

	.row:after {
		content: "";
		clear: both;
		display: block;
	}

	.col-1 { 
		width: 8.33%
	}
	.col-2 {
		width: 16.66%
	}
	.col-3 {
		width: 25%
	}
	.col-9 {
		width: 75%
	}
	[class*="col-"] {
		float: left;
		padding: 10px;
	}

	.footer { 
		background-color: blue; 
		margin-top: 1rem;
	}


	.brand {}
	.menu { 
		background-color: red;
	}
	.content {
		background-color: green;
	}
	.start {}
	.end {}

</style>
<body>

	<div class="header" >
		<div class="nav">
			<div class="nav_brand">brand</div>
			<div class="nav_menu">
				<div class="nav_start">start</div>
				<div class="nav_end">end</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="menu col-3" >menu</div>
		<div class="content col-9" >content</div>
	</div>

	<div class="footer" >footer</div>

</body>
</html>