<!-- This page is displayed after a successful payment and shows the operation code of the payment.
It also automatically redirects the user to the 'MyOrders' page after 3 seconds. -->
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Payment completed</h1>
Operation code: <?php echo htmlspecialchars($actual_request); ?>
<?php
$url = site_url('MyOrders');
header( "refresh:3; url=$url" ); ?>
</body>
</html>
