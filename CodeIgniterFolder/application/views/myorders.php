<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" lang="en">
<head>
	<meta charset="UTF-8">
	<title>My orders</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/myorders.css");?>">
</head>
<body>

<!-- The page displays a list of the user's orders -->
<h1 class="font" style="margin: 30px"> My orders</h1>

<?php
// Iterate through the user's orders
for ($i = 0; $i < count($user_orders); $i++) { ?>
	<!-- Display the date and order number for the current order -->
	<h2 style="color: #404040; display: flex; flex-direction: column"
		class="font"><?= $user_orders[$i][0]->date . ' --> order #' . $user_orders[$i][0]->order_id ?></h2>
	<!-- Iterate through the items in the current order -->
	<?php for ($j = 0; $j < count($user_orders[$i]) - 1; $j++) { ?>
		<!-- Display information about the current item -->
		<div class="flex_container font">
			<!-- Link to the page for the current item -->
			<a href="<?= site_url('PosterDescription/index/') . $user_orders[$i][$j]->photo_id; ?> ">
				<img src="<?= base_url($user_orders[$i][$j]->filepath); ?>" alt="">
			</a>
			<div class="infos">
				<!-- Display the continent and ID of the current item -->
				<p style=""><?= $user_orders[$i][$j]->continent;
					echo ' #' . $user_orders[$i][$j]->id; ?><br></p>
				<!-- Display the quantity of the current item -->
				<p style="">Quantity: <?= $user_orders[$i][$j]->quantity; ?><br></p>
				<!-- Display the size of the current item -->
				<p style="">Size (cm): <?= $user_orders[$i][$j]->size; ?><br></p>
				<!-- Display the price of the current item -->
				<p style="">Price: <?= $user_orders[$i][$j]->price . '$'; ?><br></p>
			</div>
		</div>
	<?php } ?>
	<!-- Display the total price of the current order -->
	<p class="font total_price">Total price: <?= $user_orders[$i]['order_price'] . '$'; ?></p>
<?php } ?>
</html>
