<!-- This file displays a message and operation code when a payment is canceled.
The user is redirected to their orders page after 3 seconds. -->
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Payment canceled</h1>
Operation code: <?php echo htmlspecialchars($actual_request); ?>
</body>
</html>
