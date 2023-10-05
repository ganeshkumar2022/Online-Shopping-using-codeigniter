<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container-fluid mt-3">
	<div class="row">
		<div class="col-md-8 offset-md-2 mb-3">
			<h3 class="text-center font-weight-bold text-info">All Products<a href="<?=base_url('admin/add_products')?>" class="float-right btn btn-success">Add Products</a></h3>
			<table border="1" class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>S.No</th>
						<th>Product title</th>
						<th>Product Image</th>
						<th>Product price</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
                </thead>
<?php
$i=1;
foreach($product as $product)
{
?>
				<tr>
					<td><?=$i?></td>
					<td><?=$product->title?></td>
					<td><img src="<?=base_url('products/'.$product->product_image1)?>" class="mx-auto d-block" style="height:70px;width:70px;"></td>
					<td><?=$product->price?></td>
					<td><a href="<?=base_url('admin/edit_products/'.$product->pid)?>" class="text-primary"><i class="fa-solid fa-pen-to-square"></i></a></td>
					<td><a href="<?=base_url('admin/delete_products/'.$product->pid)?>" class="text-danger"><i class="fa-solid fa-trash"></i></a></td>
				</tr>
<?php
$i++;
}
?>
			</table>
		</div>
	</div>
</div>
<?php
	if($this->session->flashdata("success"))
	{
		echo $this->session->flashdata("success");
	}
?>
</body>
</html>
