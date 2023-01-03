<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" , lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $continent ?></title>
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
			padding: 10px;
			margin: 10px;
			border-radius: 0px;
			display: block;
			width: 300px;
			height: 150px;
			font-size: 32px;
			writing-mode: vertical-lr;
			writing-mode: horizontal-tb;
		}

		ul.photos {
			list-style-type: none;
			text-align: center;
			font-size: 20px;
			display: inline;
			display: flex;
			flex-direction: row;
			align-self: center;
			margin: 0;
			padding: 0;
		}

		img {
			max-width: 100%;
			max-height: 100%;
			border-radius: 10px;
			transition: transform 1s;
		}

		img:hover {
			-ms-transform: scale(1.08); /* IE 9 */
			-webkit-transform: scale(1.08); /* Safari 3-8 */
			transform: scale(1.08);
		}
	</style>
</head>
<body>

<?php
//iterate through the photos array in blocks of 3
$modulo = count($photos) % 3;
if (count($photos) >= 3) {
	for ($i = 0; $i < intdiv(count($photos), 3); $i++) {
		?>
		<div class="flex_container">
			<ul class="photos">
				<li>
					<span1><a href="<?php echo site_url("PosterDescription/index/") . $photos[3 * $i]->id; ?>"><img
									src="<?php echo $photos[3 * $i]->url; ?>" alt=""></a>
					</span1>
				</li>
				<li>
					<span1><a href="<?php echo site_url("PosterDescription/index/") . $photos[3 * $i + 1]->id; ?>"><img
									src="<?php echo $photos[3 * $i + 1]->url; ?>" alt=""></a></span1>
				</li>
				<li>
					<span1><a href="<?php echo site_url("PosterDescription/index/") . $photos[3 * $i + 2]->id; ?>"><img
									src="<?php echo $photos[3 * $i + 2]->url; ?>" alt=""></a></span1>
				</li>
			</ul>
		</div>
	<?php } ?>
<?php } ?>
<?php
if ($modulo != 0) {
	?>
	<div class="flex_container">
		<ul class="photos">
			<!-- Display remaining photos -->
			<?php for ($i = 0; $i < $modulo; $i++) { ?>
				<li>
					<span1>
						<a href=<?php echo site_url("PosterDescription/index/") . $photos[count($photos) - $modulo + $i]->id; ?>"><img src="<?php echo $photos[count($photos) - $modulo + $i]->url; ?>
						" alt=""></a>
					</span1>
				</li>
			<?php } ?>
		</ul>
	</div>
<?php } ?>
</body>
</html>
