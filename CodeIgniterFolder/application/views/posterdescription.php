<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $photo[0]->continent;
		echo ' #' . $photo[0]->id ?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/posterdescription.css");?>">
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

			if (price !== 0) {
				document.getElementById('price').innerHTML = (parseInt(document.getElementById('quantity').value) * price).toFixed(2) + '$';
			}
		}
	</script>
</head>
<body>
<div class="flex_container">
	<!-- Display the selected photo -->
	<div class="photo_div">
		<img src="<?= $photo[0]->url; ?>" alt="">
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
				<button type="submit" style="font-size: 16px">Add to cart</button>
				<div id="price" class="font"></div>
			</div>
		</form>
	</div>
</div>
</body>
</html>
