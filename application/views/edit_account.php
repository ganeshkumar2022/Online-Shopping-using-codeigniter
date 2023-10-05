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
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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
<div class="row">
	<div class="col-md-6 offset-md-3">
	<h3 class="text-center text-info">Edit Account</h3>
	<form action="<?=base_url('user/update_profile')?>" id="regform" method="post" enctype="multipart/form-data" autocomplete="off">
	<div class="form-group">
		<label>Enter your name</label>
		<input type="text" class="form-control" name="name" value="<?=$get_profile->name?>" placeholder="Enter name" id="name">
		<span class="va_name text-danger"></span>
	</div>
	<div class="form-group">	
	<label>Enter your Email</label>
		<input type="text" class="form-control" name="email" value="<?=$get_profile->email?>" placeholder="Enter email" id="email">
		<span class="va_email text-danger"></span>
	</div>
	<label>Choose profile picture</label>
	<div class="custom-file mb-2">
    <input type="file" class="custom-file-input" id="myimage" name="myimage">
    <label class="custom-file-label" for="customFile"><?=$get_profile->myimage?></label>
  </div>
  <span class="va_myimage text-danger"></span>
	<div class="form-group">
	<label>Enter your Address</label>
		<input type="text" class="form-control" name="address" value="<?=$get_profile->address?>" placeholder="Enter address" id="address">
		<span class="va_address text-danger"></span>
	</div>
	<div class="form-group">
	<label>Enter your contact</label>
		<input type="text" class="form-control" value="<?=$get_profile->contact?>" name="contact" placeholder="Enter contact" id="contact">
		<span class="va_contact text-danger"></span>
	</div>
	<button type="submit" class="btn btn-primary px-3">Update</button>
	</form>
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
<script>
	$(document).ready(function(){
		$("#regform").submit(function(e){
			e.preventDefault();
			var name=$("#name").val();
			var email=$("#email").val();
			var myimage=$("#myimage").val();
			var address=$("#address").val();
			var contact=$("#contact").val();

			var valid=true;
			//name
			var namepattern=/^[a-zA-Z][a-zA-Z0-9_]*$/;
			if(name.length==0)
			{
				$(".va_name").text("Please fill name field");
				valid=false;
			}
			else if(name.length<5)
			{
				$(".va_name").text("username must  be atleast 5 characters");
				valid=false;
			}
			else if(!namepattern.test(name))
			{
				$(".va_name").text("Field name not valid It must start with character and contain aphabets,numerics and underscore");
				valid=false;
			}
			else
			{
				$(".va_name").text("");
			}
			//email
			var emailpattern=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
			if(email.length==0)
			{
				$(".va_email").text("Please fill email field");
				valid=false;
			}
			else if(!emailpattern.test(email))
			{
				$(".va_email").text("Enter a valid email address");
				valid=false;
			}
			else
			{
				$(".va_email").text("");
			}

			

		

			

			//address
			var addressPattern=/^[a-zA-Z0-9\s\.\/,#-]+$/;
			if(address.length==0)
			{
				$(".va_address").text("Please fill address field");
				valid=false;
			}
			else if(!addressPattern.test(address))
			{
				$(".va_address").text("Please fill a valid address format");
				valid=false;
			}
			else
			{
				$(".va_address").text("");
			}

			//phone
			var mobilePattern=/^[6-9]\d{9}$/;
			if(contact.length==0)
			{
				$(".va_contact").text("Please fill contact field");
				valid=false;
			}
			else if(!mobilePattern.test(contact))
			{
				$(".va_contact").text("Please enter valid mobile number");
				valid=false;
			}
			else
			{
				$(".va_contact").text("");
			}

			if(valid)
			{
				$(this).unbind("submit").submit();
			}

			
		});
	});
</script>
</body>
</html>
