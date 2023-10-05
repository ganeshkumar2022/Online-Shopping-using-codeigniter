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
			<h3 class="text-center font-weight-bold text-info">All Users</h3>
			<table border="1" class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>S.No</th>
						<th>User name</th>
						<th>User Email</th>
						<th>User Image</th>
						<th>User Address</th>
						<th>User Mobile</th>
						<th>Delete</th>
					</tr>
                </thead>
<?php
$i=1;
foreach($users as $category)
{
?>
				<tr>
					<td><?=$i?></td>
					<td><?=$category->name?></td>
					<td><?=$category->email?></td>
					<td><img class="mx-auto d-block" src="<?=base_url('profile_pictures/'.$category->myimage)?>" style="height:60px;width:60px;"></td>
					<td><?=$category->address?></td>
					<td><?=$category->contact?></td>
					<td><a href="<?=base_url('admin/delete_user/'.$category->uid)?>" class="text-danger"><i class="fa-solid fa-trash"></i></a></td>
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
