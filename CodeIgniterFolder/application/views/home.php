<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" , lang="en">
<head>
	<meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<style>
		body {
			color: #939395;
			background-color: #f8f8f8;
		}

		p {
			font-family: "Google Sans", Roboto, Arial, sans-serif;
			font-weight: 600;
			color: #3C4043;
			margin: 0;
		}

		.flex_container {
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

		li span1 {
			background-color: #F3D2C5;
			padding: 10px;
			margin: 10px;
			border-radius: 30px;
			display: block;
			width: 150px;
			height: 150px;
			font-size: 32px;
		}

		ul.steps {
			list-style-type: none;
			text-align: center;
			font-size: 20px;
			display: inline;
			display: flex;
			flex-direction: row;
			align-self: center;
			padding: 0;
		}

		title {
			font-weight: 600;
			display: inline;
			font-size: 32px;
			text-align: center;
		}

		li span2 {
			font-size: 130px;
			margin-left: 10px;
			margin-right: 10px;
		}
	</style>
</head>
<body>

<div class="flex_container">
	<title>Get the poster of your dreams on this website</title>
	<ul class="steps">
		<li>
			<span1>Find the photo you like the most</span1>
		</li>
		<li style="margin-top: 20px">
			<span2>&#62;</span2>
		</li>
		<li>
			<span1>Select the size of the poster you want</span1>
		</li>
		<li style="margin-top: 20px">
			<span2>&#62;</span2>
		</li>
		<li>
			<span1>
				<div style="margin-top: 75px; transform: translateY(-50%)">Order it</div>
			</span1>
		</li>
	</ul>
</div>

</body>
</html>
