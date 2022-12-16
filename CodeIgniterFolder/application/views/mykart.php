<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" , lang="en">
<head>
	<meta charset="UTF-8">
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

<?php
for ($i = 0; $i < count($user_kart); $i++) {
	?>
	<div class="flex_container font">
		<div style="display: flex; flex-direction: row">
			<div class="photos">
				<a href="<?php echo site_url('PosterDescription/index/') . $user_kart[$i]->id; ?> "><img
							src="<?php echo $user_kart[$i]->url; ?>"
							alt=""></a>

			</div>
			<div class="photos">
				<p style=""># <?php echo $user_kart[0]->continent; ?> # <?php echo $user_kart[$i]->id; ?><br></p>
				<p style="">Quantity: <?php echo $user_kart[$i]->quantity; ?><br></p>
				<p style="">Size (cm): <?php echo $user_kart[$i]->size; ?><br></p>
			</div>
			<div class="photos">
				<p style="">Price: <?php echo $user_kart[$i]->price; ?><br></p>
			</div>
			<div class="photos">
				<a href="<?php echo site_url('MyKart/remove_item/') . $user_kart[$i]->id . '/' . $user_kart[$i]->quantity . '/' . $user_kart[$i]->size; ?>"
				   style="font-size: small">Remove
					from Kart</a>
			</div>
		</div>
	</div>
<?php } ?>
<div class="photos" style="text-align: center">
	<a href="<?php echo site_url('MyKart/remove_all_items'); ?>"><input type="button" value="Pay"/></a>
</div>
</body>
</html>
