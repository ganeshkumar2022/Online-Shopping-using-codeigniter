<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Shopping</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
	
	.footer
	{
		position:static !important;
	}
	.flex-column .nav-item
	{
		
	}
	.flex-column .nav-item:hover
	{
		background-color:gray;
		
	}
	.navsd:hover
	{
		background-color:rgb(52,58,64) !important;
	}
</style>
</head>
<body>
<p class="bg-info py-2 text-white pl-2">Welcome 
<?php
if($this->session->has_userdata("uid"))
{
	echo $get_profile->name;
}
else
{
	echo " Guest";
}
if($this->session->has_userdata("uid"))
{
	?>
	<a href="<?=base_url('user/logout')?>" class="ml-3 text-decoration-none text-white">Logout</a>
	<?php
}
?>
</p>
<div style="width:100%;">

<div style="width:80%;float:right;">
<div class="container-fluid">
	<h3 class="text-center">You have zero pending orders</h3>
	<center><a href="<?=base_url('home/products')?>">Explore our products</a></center>
</div>
</div>
<div style="width:20%;height:100vh;" class="bg-dark mt-n3">
<?php
include("leftbar.php");
?>
</div>
<?php
include("footer.php");
?>
</body>
</html>
