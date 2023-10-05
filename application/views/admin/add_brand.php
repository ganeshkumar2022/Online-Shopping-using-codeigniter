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
			<h3 class="text-center font-weight-bold">Add Brand</h3>
			<form action="<?=base_url('admin/verify_add_brand')?>" method="post" autocomplete="off">
			<div class="form-group">
				<label for="email">Brand name:</label>
				<input type="text" class="form-control" name="bname" placeholder="Enter brand name" id="email" required>
			</div>
		
			<button type="submit" name="submit" class="btn btn-primary">Insert Brand</button>
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
