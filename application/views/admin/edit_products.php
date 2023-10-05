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
</head>
<body>
<div class="container-fluid mt-3">
	<div class="row">
		<div class="col-md-6 offset-md-3 mb-3">
			<h3 class="text-center font-weight-bold">Edit Products</h3>
			<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
			<div class="form-group">
				<label for="email">Product title:</label>
				<input type="text" class="form-control" name="title" value="<?=$product->title?>" placeholder="Enter product title" id="email" required>
			</div>
			<div class="form-group">
				<label for="pwd">Product Description:</label>
				<input type="text" class="form-control" name="description" value="<?=$product->description?>" placeholder="Enter product description" id="pwd" required>
			</div>
			<div class="form-group">
				<label for="pwd">Product Keyword:</label>
				<input type="text" class="form-control" value="<?=$product->keyword?>" name="keyword" placeholder="Enter product keyword" id="pwd" required>
			</div>
			<div class="form-group">
				<label for="pwd">Product Price:</label>
				<input type="number" class="form-control" value="<?=$product->price?>" name="price" placeholder="Enter product price" id="pwd" required>
			</div>
			<div class="form-group">
			<label for="sel1">Select category:</label>
			<select class="form-control" id="sel1" name="category" required>
				<option value="">Select Category</option>
<?php
foreach($category as $category)
{
	?>
	<option value="<?=$category->cid?>" <?php if($product->category==$category->cid) { echo "selected"; } ?>><?=$category->cname?></option>
	<?php
}
?>
			</select>
			</div>
			<div class="form-group">
			<label for="sel1">Select Brand:</label>
			<select class="form-control" id="sel1" name="brand" required>
				<option value="">Select Brand</option>
				<?php
foreach($brand as $brand)
{
	?>
	<option value="<?=$brand->bid?>" <?php if($product->brand==$brand->bid) { echo "selected"; } ?>><?=$brand->bname?></option>
	<?php
}
?>
			</select>
			</div>
			<label>Product Image 1</label>
			<div class="input-group mb-1">
				<input type="file" class="form-control border" name="product_image1">
			<div class="input-group-append">
			<span class="">
				<img src="<?=base_url('products/'.$product->product_image1)?>" style="height:70px;width:80px;">
			</span>
			</div>
		</div>
		<label>Product Image 2</label>
			<div class="input-group mb-1">
				<input type="file" class="form-control border" name="product_image2">
			<div class="input-group-append">
			<span class="">
				<img src="<?=base_url('products/'.$product->product_image2)?>" style="height:70px;width:80px;">
			</span>
			</div>
		</div>
		<label>Product Image 3</label>
			<div class="input-group mb-1">
				<input type="file" class="form-control border" name="product_image3">
			<div class="input-group-append">
			<span class="">
				<img src="<?=base_url('products/'.$product->product_image3)?>" style="height:70px;width:80px;">
			</span>
			</div>
		</div>
  

			<input type="submit" class="btn btn-primary" value="Update Product" name="update">
			</form>
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
