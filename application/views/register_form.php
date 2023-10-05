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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  
<style>
	*
	{
		margin:0;
		padding:0;
	}
	.footer
	{
		position:static !important;
	   	
	}
	textarea
	{
		resize:none;
		
	}
</style>
</head>
<body>
<p class="bg-info py-2 text-white pl-2">Welcome Guest</p>
<div class="container-fluid">
<h3 class="text-center font-weight-bold">Registration Form</h3>
<div class="row">
	<div class="col-md-6 offset-md-3">
	<form action="<?=base_url('user/add_user')?>" id="regform" method="post" autocomplete="off" enctype="multipart/form-data">
  <div class="form-group">
    <label for="email">Username:</label>
    <input type="text" class="form-control" name="name" placeholder="Enter your name" id="name">
		<span class="text-danger small va_name"></span>
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="text" class="form-control" name="email" placeholder="Enter your email" id="email">
		<span class="text-danger small va_email"></span>
  </div>
  <div class="form-group">
    <label for="email">User Image:</label>
	<div class="custom-file">
    <input type="file" class="custom-file-input" id="myimage" name="myimage">
    <label class="custom-file-label" for="customFile">Choose file</label>
  </div>
	<span class="text-danger small va_myimage"></span>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password" placeholder="Enter password" id="password">
		<span class="text-danger small va_password"></span>
  </div>
  <div class="form-group">
    <label for="pwd">Confirm Password:</label>
    <input type="password" class="form-control" name="confirm_password" placeholder="Enter password" id="confirm_password">
		<span class="text-danger small va_confirm_password"></span>
  </div>
  <div class="form-group">
  <label for="comment">Address:</label>
  <textarea class="form-control" rows="5" id="address" name="address" placeholder="Enter your address"></textarea>
	<span class="text-danger small va_address"></span>
</div>
  <div class="form-group">
    <label for="pwd">Contact:</label>
    <input type="number" class="form-control" name="contact" placeholder="Enter mobile no" id="contact">
		<span class="text-danger small va_contact"></span>
  </div>
  <input type="submit" class="btn btn-primary px-4" value="Register">
</form>
<p class="font-weight-bold">Already have an account? <a href="<?=base_url('user/login')?>" class="text-danger">Login</a></p>
	</div>
</div>
</div>
</div>
<script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<?php
if($this->session->flashdata("success"))
{
	?>
	<script>
		const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Signup successfully'
})
	</script>
	<?php
}
if($this->session->flashdata("error"))
{
	?>
	<script>
		const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'error',
  title: '<?=$this->session->flashdata("error")?>'
})
	</script>
	<?php
}
?>
<script>
	$(document).ready(function(){
		$("#regform").submit(function(e){
			e.preventDefault();
			var name=$("#name").val();
			var email=$("#email").val();
			var myimage=$("#myimage").val();
			var password=$("#password").val();
			var confirm_password=$("#confirm_password").val();
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

			//image
			if(myimage.length==0)
			{
				$(".va_myimage").text("Please Choose a image file");
				valid=false;
			}
			else
			{
				$(".va_myimage").text("");
			}

			//password
			if(password.length==0)
			{
				$(".va_password").text("Please fill password field");
				valid=false;
			}
			else if(password.length<6)
			{
				$(".va_password").text("Password must be atleast 6 characters");
				valid=false;
			}
			else
			{
				$(".va_password").text("");
			}

			// confirm password
				if(confirm_password.length==0)
			{
				$(".va_confirm_password").text("Please fill confirm password field");
				valid=false;
			}
			else if(confirm_password!==password)
			{
				$(".va_confirm_password").text("Password do not match");
				valid=false;
			}
			else
			{
				$(".va_confirm_password").text("");
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
