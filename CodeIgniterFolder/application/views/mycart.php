<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" lang="en">
<head>
	<meta charset="UTF-8">
	<title>My cart</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/mycart.css");?>">
</head>
<body>

<!-- This file displays the items in the user's shopping cart and allows the user to pay for the items -->

<!-- Loop through each item in the user's shopping cart -->
<?php for ($i = 0; $i < count($user_cart); $i++) { ?>
<!-- Display information about the item and a link to remove the item from the cart -->
<div class="flex_container font">
	<div style="display: flex; flex-direction: row; margin-bottom: 1px; background-color: #f8f8f8;">
		<!-- Link to the page displaying the item's description -->
		<a href="<?= site_url('PosterDescription/index/') . $user_cart[$i]->id; ?> ">
			<!-- Display the item's image -->
			<img src="<?= base_url($user_cart[$i]->filepath); ?>" alt="">
		</a>
		<div class="infos">
			<!-- Display the item's continent and ID -->
			<p style=""><?= $user_cart[$i]->continent;
				echo ' #' . $user_cart[$i]->id; ?><br></p>
			<!-- Display the item's quantity -->
			<p style="">Quantity: <?= $user_cart[$i]->quantity; ?><br></p>
			<!-- Display the item's size -->
			<p style="">Size (cm): <?= $user_cart[$i]->size; ?><br></p>
			<!-- Display the item's price -->
			<p style="">Price: <?= $user_cart[$i]->price . '$'; ?><br></p>
			<!-- Link to remove the item from the cart -->
		</div>
		<div style="flex-grow: 1">
			<a href="<?= site_url('MyCart/remove_item/') . $user_cart[$i]->id . '/' . $user_cart[$i]->quantity . '/' . $user_cart[$i]->size; ?>"
			   style="font-size: small; float: right">
				Remove from cart
			</a>
		</div>
	</div>
	<?php } ?>
	<!-- Display the total price of the items in the cart and a button to pay for the items -->
	<p class="font">Total price: <?= $cart_total_price . '$'; ?></p>
	<a href="<?= site_url('PaymentForm'); ?>">
		<button>Pay</button>
	</a>
</body>
</html>
