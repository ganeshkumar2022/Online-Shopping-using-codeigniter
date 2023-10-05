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
	body
	{
		width:100vw;
		overflow-x:hidden;
	}
	.footer
	{
		position:static;
		overflow-x:hidden;
		overflow-y:hidden;
	}
	.zxc .nav-item
	{
		border-bottom:1px solid lightgray;
	}
	.zxc .nav-item:hover
	{
		background-color:lightblue;
		color:black;
	}
</style>
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

<div class="row">
<?php
if(isset($_GET["id"]))
{
	foreach($products as $p)
	{
		?>
		<div class="col-md-4 my-2">
			<form action="<?=base_url('home/products')?>" method="post">
				<input type="hidden" name="title" value="<?=$p->title?>">
				<input type="hidden" name="price" value="<?=$p->price?>">
				<input type="hidden" name="product_image1" value="<?=$p->product_image1?>">
				<input type="hidden" name="product_id" value="<?=$p->pid?>">
				<input type="hidden" name="user_id" value="<?php if($this->session->has_userdata("uid")) { echo $this->session->userdata("uid"); } else { echo 0; } ?>">
			<div class="card">
			<a class="text-decoration-none text-dark">
				<img src="<?=base_url('products/'.$p->product_image1)?>" style="height:200px;width:100%;">
				<div class="card-body">
					<h5><?=$p->title?></h5>
					<p class="small text-left"><?=substr($p->description,0,50).".."?></p>
					<p>Price : <?=$p->price?> /-</p>
			
						<input type="submit" name="add_cart" class="btn btn-info btn-sm" value="Add to Cart">
						<a href="<?=base_url('home/products')?>" class="btn btn-secondary btn-sm">Go back</a>
			
				</div>
			</a>
			</div>
	        </form>
		</div>
		<div class="col-md-8">
			<h3 class="text-info text-center mt-3">Related Products</h3>
			<div class="row mt-5">
				<div class="col-md-6">
				<img src="<?=base_url('products/'.$p->product_image2)?>" style="height:200px;width:100%;">
				</div>
				<div class="col-md-6">
				<img src="<?=base_url('products/'.$p->product_image3)?>" style="height:200px;width:100%;">
				</div>
	        </div>
		</div>
		<?php
	}
}
else
{
foreach($products as $p)
{
	?>
	<div class="col-md-4 my-2">
	<form action="<?=base_url('home/products')?>" method="post">
				<input type="hidden" name="title" value="<?=$p->title?>">
				<input type="hidden" name="price" value="<?=$p->price?>">
				<input type="hidden" name="product_image1" value="<?=$p->product_image1?>">
				<input type="hidden" name="product_id" value="<?=$p->pid?>">
				<input type="hidden" name="user_id" value="<?php if($this->session->has_userdata("uid")) { echo $this->session->userdata("uid"); } else { echo 0; } ?>">
			
		<div class="card">
		<a class="text-decoration-none text-dark">
			<img src="<?=base_url('products/'.$p->product_image1)?>" style="height:200px;width:100%;">
			<div class="card-body">
				<h5><?=$p->title?></h5>
				<p class="small text-left"><?=substr($p->description,0,50).".."?></p>
				<p>Price : <?=$p->price?> /-</p>
		
					<input type="submit" class="btn btn-info btn-sm" name="add_cart" value="Add to Cart">
					<a href="<?=base_url('home/products?id='.$p->pid)?>" class="btn btn-secondary btn-sm">View more</a>
		
			</div>
        </a>
		</div>
		</form>
	</div>
	<?php
}
}
?>
</div>

</div>
</div>

<?php
include("footer.php");
?>
</body>
</html>



