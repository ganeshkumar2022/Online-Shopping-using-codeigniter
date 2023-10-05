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

<div style="width:80%;height:100vh;float:right;background-color:lightgray;">
<div class="container-fluid">
<div class="row">
	<div class="col-md-6 offset-md-3">
	<h3 class="text-center text-primary">Delete Account</h3>
	<div class="card">
		<div class="card-body">
			<img src="<?=base_url('assets/images/delete.jpg')?>" class="mx-auto d-block">
			<h4 class="text-center">Are you sure you want to delete your account</h4>
			<div class="px-5 mt-5 mb-5">
				<a href="<?=base_url('user/confirm_delete')?>" class="btn btn-danger float-left">Yes, delete</a>
				<a href="" class="btn btn-success float-right">Keep Account</a>
			</div>
		</div>
	</div>
</div>
</div>
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
<script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<?php
if($this->session->flashdata("success"))
{
	echo "<script>alert('Profile updated successfully');</script>";
}
if($this->session->flashdata("error"))
{
	echo "<script>alert('Error to update a profile');</script>";
}
?>
</body>
</html>
