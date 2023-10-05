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
<div class="container">
<div class="col-md-12">
<h3 class="text-center font-weight-bold">Online Shopping</h3>
<p class="text-center">India's biggest online store for Mobiles, Fashion (Clothes/Shoes), Electronics,<br>Home Appliances, Books, Home, Furniture, Grocery, Jewelry</p>
<table class="table table-bordered">
	<tr class="bg-primary text-white">
		<th>Product title</th>
		<th>Product image</th>
		<th>Quantity</th>
		<th>Total price</th>
		<th>Manage</th>
	</tr>
<?php
$total=0;
foreach($cart as $cart)
{
	$total+=$cart->price;
	?>
	<tr>
		<form action="" method="post" autocomplete="off">
		<td><?=$cart->title?><input type="hidden" name="cart_id" value="<?=$cart->cart_id?>"></td>
		<td><?=$cart->product_image1?></td>
		<td><input type="number" name="quantity" min="1"></td>
		<td><?=$cart->price?><input type="hidden" name="price" value="<?=$cart->price?>"></td>
		<td>
			<input class="btn btn-success btn-sm" name="update_cart" type="submit" value="Update Cart">
			<input class="btn btn-danger btn-sm" name="delete_cart" type="submit" value="Remove Item">
		</td>
        </form>
	</tr>
	<?php
}
?>
</table>
<h3>Subtotal :<span class="text-info"><?=$total?>/-</span>
<a href="<?=base_url('home/products')?>" class="btn btn-info">Continue Shopping</a>
<a href="<?=base_url('home/checkout')?>" class="btn btn-secondary">Checkout</a>
</h3>
</div>
</div>
</div>
</body>
</html>



