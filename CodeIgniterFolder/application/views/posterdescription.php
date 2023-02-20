<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $photo[0]->continent;
		echo ' #' . $photo[0]->id ?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<style>

		div.flex_container {
			display: flex;
			flex-direction: row;
		}

		div.photo_div {
			width: 50%;
			align-self: center;
			display: flex;
			justify-content: center;
			margin: 2px;
			padding: 10px;
		}

		div.product_info {
			display: flex;
			flex-direction: column;
			background-color: #f8f8f8;
			width: 50%;
			height: 430px;
			padding: 40px;
		}

		button, .button {
			background-color: #abac87;
			padding: 8px 20px;
			border-radius: 4px;
			font-size: 16px;
			line-height: 24px;
			font-weight: 600;
			font-family: "Google Sans Display";
			border: 0;
			color: #FFFFFF;
			text-align: center;
			margin: 2px;
		}

		button:hover {
			background-color: rgb(25 24 24 / 16%)
		}

		.title {
			height: 100px;
			font-size: 32px;
			margin-top: 75px;
		}

		img {
			max-height: 100%;
			max-width: 100%;
		}

		.button label,
		.button input {
			display: block;
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			text-align: center;
		}

		.button input[type="radio"] {
			opacity: 0.011;
			z-index: 100;
			width: 90%;
			height: 90%;
		}

		.button input[type="radio"]:not(:checked) + label {
			background-color: #e9d8d8;
			border-radius: 4px;
		}

		.button input[type="radio"]:checked + label {
			background: #20b8be;
			border-radius: 4px;
		}

		.button label {
			cursor: pointer;
			z-index: 90;
			line-height: 1.8em;
		}

		.font {
			font-family: "Google Sans", Roboto, Arial, sans-serif;
			font-weight: 600;
			color: #b0b0b4;
		}

		.size_container {
			margin-bottom: 10px;
		}

		#quantity {
			display: flex;
			flex-direction: column;
		}
	</style>

	<!-- Display the price based on the selected size -->
	<script>
		display_price = function () {
			let size = $("input:radio[name ='radio_buttons']:checked").val();
			let price = 0;

			switch (size) {
				case "40x50":
					price = 29.99;
					break;
				case "50x70":
					price = 39.99;
					break;
				case "60x90":
					price = 59.99;
					break;
				case "100x150":
					price = 79.99;
					break;
				case "120x180":
					price = 99.99;
					break;
			}

			if (price != 0) {
				document.getElementById('price').innerHTML = (parseInt(document.getElementById('quantity').value) * price).toFixed(2) + '$';
			}
		}
	</script>
</head>
<body>
<div class="flex_container">
	<!-- Display the selected photo -->
	<div class="photo_div">
		<img src="<?= $photo[0]->url; ?>">
	</div>
	<!-- Display the description of the photo -->
	<div class="product_info">
		<!-- Display the form for selecting the size of the poster and adding it to the cart -->
		<!-- Form for selecting size and quantity of poster -->
		<form class="size_form" name="size_form" action="<?= site_url('MyCart/add_to_cart/') . $photo[0]->id; ?>"
			  method="post">
			<div class="font title">
				<?= $photo[0]->continent; ?> #<?= $photo[0]->id; ?>
			</div>
			<label class="font">Size (cm):</label>
			<div class="size_container">
				<!-- Radio buttons for selecting size of poster -->
				<!-- 40x50 cm size option -->
				<input id="size1" class="btn btn-default" type="radio" value="40x50" name="radio_buttons"
					   onclick="display_price();" required>
				<label for="size1">40 x 50</label>
				<!-- 50x70 cm size option -->
				<input id="size2" class="btn btn-default" type="radio" value="50x70" name="radio_buttons"
					   onclick="display_price();">
				<label for="size2">50 x 70</label>
				<!-- 60x90 cm size option -->
				<input id="size3" class="btn btn-default" type="radio" value="60x90" name="radio_buttons"
					   onclick="display_price();">
				<label for="size3">60 x 90</label>
				<!-- 100x150 cm size option -->
				<input id="size4" class="btn btn-default" type="radio" value="100x150" name="radio_buttons"
					   onclick="display_price();">
				<label for="size4">100 x 150</label>
				<!-- 120x180 cm size option -->
				<input id="size5" class="btn btn-default" type="radio" value="120x180" name="radio_buttons"
					   onclick="display_price();">
				<label for="size5">120 x 180</label>
			</div>

			<!-- Dropdown menu for quantity selection -->
			<label for="quantity" class="font">Quantity:</label>
			<select id="quantity" onchange="display_price();" name="quantity">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
			<br><br>
			<!-- Displays the current price of the poster based on the selected size and quantity. -->
			<div style="text-align: center" class="buy">
				<button type="submit">Add to cart</button>
				<div id="price" class="font"></div>
			</div>
		</form>
	</div>
</div>
</body>
</html>
