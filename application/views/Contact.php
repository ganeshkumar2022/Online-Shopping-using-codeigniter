<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact us page</title>
<style>
	*
	{
		margin:0;
		padding:0;
	}
	body
	{
		background-color:lightgray;
	}
	.footer
	{
		position:static;
	}
	textarea
	{
		resize:none;
	}
</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row my-4">
		<div class="col-md-6">
			<h2 class="text-primary mt-3 font-weight-bold">Contact Us</h2>
			<form action="" method="post" autocomplete="off">
			<div class="form-group">
				<label for="email">Name:</label>
				<input type="text" class="form-control" placeholder="Enter name" required name="name" id="email">
			</div>
			<div class="form-group">
				<label for="pwd">Email address:</label>
				<input type="email" class="form-control" name="email" required placeholder="Enter email" id="pwd">
			</div>
			<div class="form-group">
			<label for="comment">Message:</label>
			<textarea class="form-control" placeholder="Enter your message here" rows="5" id="comment" name="message" required></textarea>
			</div>
			<input type="submit" class="btn btn-info px-5 btn-lg" name="submit" style="border-radius:150px;" value="Send Message">
			</form>
		</div>
		<div class="col-md-6">
			<img src="<?=base_url('assets/images/contact.webp')?>">
		</div>
		</div>
	</div>
<?php
include("footer.php");
?>
</body>
</html>
