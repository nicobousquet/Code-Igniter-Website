<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" , lang="en">
<head>
	<meta charset="UTF-8">
	<title>My orders</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<style>
		.flex_container {
			border-radius: 0px;
			display: flex;
			flex-direction: column;
			overflow: hidden;
			background-color: #f8f8f8;
			margin: 1px;
		}

		li span1 {
			/*background-color: #EFF4C5;*/

		}

		.photos {
			list-style-type: none;
			text-align: center;
			font-size: 20px;
			display: inline;
			display: flex;
			flex-direction: row;
			align-self: center;
			padding: 10px;
			margin: 10px;
			border-radius: 0px;
			display: block;
			width: 300px;
			height: 150px;
			writing-mode: vertical-lr;
			writing-mode: horizontal-tb;
			text-align: left;
		}

		img {
			max-width: 100%;
			max-height: 100%;
			border-radius: 10px;
			transition: transform 1s;
		}

		.font {
			font-family: "Google Sans", Roboto, Arial, sans-serif;
			font-weight: 600;
			color: #b0b0b4;
		}

		input[type=text], input[type=email], input[type=password], select {
			padding: 6px 8px;
			margin: 15px 10px 0 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			width: 100%;
		}

		input[type=button] {
			background-color: #abac87;
			color: white;
			padding: 14px 20px;
			margin: 50px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		input:enabled[type=button]:hover {
			background-color: rgb(25 24 24 / 16%)
		}
	</style>
</head>
<body>

<!-- The page displays a list of the user's orders -->
<h1 class="font" style="margin: 30px"> My orders</h1>

<?php

// Iterate through the user's orders
for ($i = 0; $i < count($user_orders); $i++) { ?>

	<!-- Display the date and order number for the current order -->
	<h2 style="color: #404040"
		class="font"><?php echo $user_orders[$i][0]->date . ' --> order #' . $user_orders[$i][0]->order_id ?></h2>

	<!-- Iterate through the items in the current order -->
	<?php for ($j = 0; $j < count($user_orders[$i]) - 1; $j++) { ?>

		<!-- Display information about the current item -->
		<div class="flex_container font">
			<div style="display: flex; flex-direction: row">
				<div class="photos">
					<!-- Link to the page for the current item -->
					<a href="<?php echo site_url('PosterDescription/index/') . $user_orders[$i][$j]->photo_id; ?> "><img
								src="<?php echo $user_orders[$i][$j]->url; ?>"
								alt=""></a>
				</div>
				<div class="photos">
					<!-- Display the continent and ID of the current item -->
					<p style=""><?php echo $user_orders[$i][$j]->continent;
						echo ' #' . $user_orders[$i][$j]->id; ?><br></p>
					<!-- Display the quantity of the current item -->
					<p style="">Quantity: <?php echo $user_orders[$i][$j]->quantity; ?><br></p>
					<!-- Display the size of the current item -->
					<p style="">Size (cm): <?php echo $user_orders[$i][$j]->size; ?><br></p>
				</div>
				<div class="photos">
					<!-- Display the price of the current item -->
					<p style="">Price: <?php echo $user_orders[$i][$j]->price . '$'; ?><br></p>
				</div>
			</div>
		</div>
	<?php } ?>

	<!-- Display the total price of the current order -->
	<div class="photos" style="text-align: center">
		<p class="font">Total price: <?php echo $user_orders[$i]['order_price'] . '$'; ?></p>
	</div>
<?php } ?>
``

</html>
