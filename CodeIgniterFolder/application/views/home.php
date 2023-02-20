<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" , lang="en">
<head>
	<meta charset="UTF-8">
	<title style="display: none">Home</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<style>
		body {
			color: #939395;
			background-color: #f8f8f8;
		}

		.flex_container {
			height: 50%;
			display: flex;
			flex-direction: column;
			overflow: hidden;
			background-color: #F8E1D8;
			margin: 0;
			position: absolute;
			top: 50%;
			-ms-transform: translateY(-50%);
			transform: translateY(-50%);
			z-index: -1;
			width: 100%;
			padding: 20px;
		}

		.box {
			background-color: #F3D2C5;
			padding: 10px;
			margin: 10px;
			border-radius: 30px;
			width: 150px;
			height: 150px;
			font-size: 32px;
			display: grid;
			place-items: center;
		}

		.arrow {
			width: 50px;
			font-size: 32px;
			display: grid;
			place-items: center;
		}

		.steps {
			justify-content: center;
			text-align: center;
			font-size: 20px;
			display: flex;
			flex-direction: row;
			padding: 0;
			margin-top: 20px;
		}

		title {
			font-weight: 600;
			display: inline;
			font-size: 32px;
			text-align: center;
		}
	</style>
</head>
<body>
<!-- This is the main container for the page. It is a flexbox container with a column layout, and it is positioned in the center of the page -->
<div class="flex_container">
	<title>Get the poster of your dreams on this website</title>
	<!-- List of steps to purchase a poster, displayed in a row using flexbox -->
	<div class="steps">
		<!-- Step 1: find the photo you like the most -->
		<div class="box">
			Find the photo you like the most
		</div>
		<!-- Arrow between steps -->
		<div class="arrow">
			&#62;
		</div>
		<!-- Step 2: select the size of the poster you want -->
		<div class="box">
			Select the size of the poster you want
		</div>
		<!-- Arrow between steps -->
		<div class="arrow">
			&#62;
		</div>
		<!-- Step 3: order it -->
		<div class="box">
			Order it
		</div>
	</div>
</div>
</body>
</html>
