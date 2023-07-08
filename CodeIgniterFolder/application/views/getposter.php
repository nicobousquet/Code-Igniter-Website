<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $continent ?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/getposter.css");?>">
</head>
<body>

<?php
//iterate through the photos array in blocks of 3
$modulo = count($photos) % 3;
if (count($photos) >= 3) {
	for ($i = 0; $i < intdiv(count($photos), 3); $i++) { ?>
		<div class="flex_container">
			<a href="<?= site_url("PosterDescription/index/") . $photos[3 * $i]->id; ?>">
				<img src="<?= base_url($photos[3 * $i]->filepath); ?>" alt="">
			</a>
			<a href="<?php echo site_url("PosterDescription/index/") . $photos[3 * $i + 1]->id; ?>">
				<img src="<?= base_url($photos[3 * $i + 1]->filepath); ?>" alt="">
			</a>
			<a href="<?= site_url("PosterDescription/index/") . $photos[3 * $i + 2]->id; ?>">
				<img src="<?= base_url($photos[3 * $i + 2]->filepath); ?>" alt="">
			</a>
		</div>
	<?php } ?>
<?php }

if ($modulo != 0) { ?>
	<div class="flex_container">
		<!-- Display remaining photos -->
		<?php for ($i = 0; $i < $modulo; $i++) { ?>
			<a href="<?= site_url("PosterDescription/index/") . $photos[count($photos) - $modulo + $i]->id; ?>">
				<img src="<?= base_url($photos[count($photos) - $modulo + $i]->filepath); ?>" alt="">
			</a>
		<?php } ?>
	</div>
<?php } ?>
</body>
</html>
