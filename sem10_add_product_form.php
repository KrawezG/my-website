<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
</head>

<body>



<?php
if(isset($_SESSION['is_admin']))
{ 
?>

	<div class="content">
		<p>You need administrator provilidges to add products!:</p>
		<form method="POST" action='sem10_login.php'>
			Username:
			<br>
			<input type="text" name="username">
			<br>
			Password:
			<br>
			<input type="password" name="password">
			<br>
			<br>
			<input type="submit" value="Log In">
		</form>
	</div>

<?php 
}
else
{ 
?>
<div class="content">
	<form action="sem10_add_product.php" method="POST">
		Input product type:
		<br>
		<input type="text" name="type">
		<br>

		Input product name:
		<br>
		<input type="text" name="name">
		<br>

		Input product description:
		<br>
		<textarea name="description" rows="5" cols="30">
		</textarea>
		<br>

		Input product manufacturer:
		<br>
		<input type="text" name="manufacturer">
		<br>

		Input product price:
		<br>
		<input type="text" name="price">
		<br>

		Input product photo path:
		<br>
		<input type="text" name="photo_path">
		<br>

		<input type="submit" value="Add product">
	</form>
</div>
<?php } ?>

<div class="footer">
	<h3>IU4</h3>
</div>
</body>
</html>
