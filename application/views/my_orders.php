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
<h3 class="text-primary">My orders</h3>
<table class="table table-bordered">
	<thead class="bg-primary text-white">
	<tr>
		<th>S.No</th>
		<th>Order no</th>
		<th>Amount due</th>
		<th>Total products</th>
		<th>Invoice no</th>
		<th>Date</th>
		<th>Complete/Incomplete</th>
		<th>status</th>
	</tr>
    </thead>
<?php
if($order!=null)
{
$i=1;
foreach($order as $order)
{
?>
<tr>
	<td><?=$i?></td>
	<td><?=$order->oid?></td>
	<td><?=$order->amount_due?></td>
	<td><?=$order->total_products?></td>
	<td><?=$order->invoice_no?></td>
	<td><?=$order->reading_time?></td>
	<td><?=$order->status?></td>
	<td>
		<?php
		if($order->status=="Incomplete")
		{
			?>
		<a href="<?=base_url('user/confirm_payment?id='.$order->oid)?>">Confirm</a></td>
		<?php
		}
		else
		{
			echo "Paid";
		}
		?>
</tr>
<?php
$i++;
}
echo "</table>";
}
else
{
?>
	<h3 class="text-center">You have no orders</h3>
	<center><a href="<?=base_url('home/products')?>">Explore our products</a></center>
<?php
}
?>
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
<?php
if($this->session->flashdata("success"))
{
echo $this->session->flashdata("success");
}
?>
</body>
</html>
