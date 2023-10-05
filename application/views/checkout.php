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
</head>
<body>
<p class="bg-info py-2 text-white pl-2">Welcome 
<?php
if($this->session->has_userdata("uid"))
{
	echo "User";
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
<div class="row mt-n3">
<div class="col-md-12">
<h3 class="text-center font-weight-bold">Online Shopping</h3>
<p class="text-center">India's biggest online store for Mobiles, Fashion (Clothes/Shoes), Electronics,<br>Home Appliances, Books, Home, Furniture, Grocery, Jewelry</p>
<h3 class="text-info text-center">Payment Options</h3>
<div class="row mt-4 ml-3">
	<div class="col-md-6">
		<a href="<?=base_url('home/orders')?>">
		<img src="<?=base_url('assets/images/paytm.avif')?>" style="height:300px;">
        </a>
	</div>
	<div class="col-md-6">
	<a href="<?=base_url('home/orders')?>"><h3 style="margin:100px;text-decoration:underline;">Pay Offline</h3></a>
	</div>
</div>
</div>
</div>
</body>
</html>



