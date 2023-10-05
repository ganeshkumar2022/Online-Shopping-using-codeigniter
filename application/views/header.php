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

<nav class="navbar navbar-expand-md bg-white navbar-light">
  <a class="navbar-brand" href="#"><img src="<?=base_url('assets/images/shopping.png')?>" style="height:60px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url("home")?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url("home/products")?>">Products</a>
      </li>
			<li class="nav-item">
        <a class="nav-link" href="<?=base_url("home/contact")?>">Contact</a>
      </li>
<?php
if($this->session->userdata("uid"))
{
	?>
  <li class="nav-item">
    <a class="nav-link" href="<?=base_url('user/dashboard')?>">Dashboard</a>
  </li>
	<?php
}
else
{
?>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('user/register')?>">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('user/login')?>">Login</a>
      </li>
<?php
}
?>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('home/cart')?>"><i class="fa-solid fa-cart-shopping"></i><sup><span style="font-size:10px;font-weight:bold;"><?=@$count?></span></sup></a>
      </li>
	  
      <li class="nav-item">
        <a class="nav-link" href="#">Total price: <?=$amount?>/-</a>
      </li>  
    </ul>
	<form class="form-inline" autocomplete="off" action="<?=base_url('home/products')?>" method="get" style="position:absolute;right:5px;">
    <div class="input-group mx-2">
      <input type="text" class="form-control" placeholder="Search" name="search">
    </div>
	<button class="btn btn-primary mr-4" type="submit">Search</button>
  </form>
  </div>  
</nav>
</body>
</html>


