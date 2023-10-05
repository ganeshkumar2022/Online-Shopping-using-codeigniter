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

<nav class="navbar navbar-expand-md  bg-primary py-3 navbar-dark">
<a class="navbar-brand" href="#" >Admin Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" href="<?=base_url('admin/dashboard')?>">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?=base_url('admin/all_products')?>">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?=base_url('admin/all_category')?>">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?=base_url('admin/all_brand')?>">Brands</a>
      </li>
			<li class="nav-item">
        <a class="nav-link text-white" href="<?=base_url('admin/all_orders')?>">All orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?=base_url('admin/all_payments')?>">All payments</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?=base_url('admin/list_users')?>">List users</a>
      </li>
			<li class="nav-item">
        <a class="nav-link text-white" href="<?=base_url('admin/all_notifications')?>">All Notifications</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?=base_url('admin/logout')?>">Logout</a>
      </li>
	  
 
 
    </ul>
  </div>  
</nav>
</body>
</html>


