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
</head>
<body>
<p class="bg-info py-2 text-white pl-2">Welcome Guest</p>
<div class="container-fluid">
<h3 class="text-center font-weight-bold">User login</h3>
<div class="row">
	<div class="col-md-6 offset-md-3">
	<form action="<?=base_url('user/check_login')?>" id="logform" method="post" autocomplete="off">
  <div class="form-group">
    <label for="email">Username:</label>
    <input type="text" class="form-control" name="name" placeholder="Enter your name" id="name">
		<span class="va_name text-danger"></span>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password" placeholder="Enter password" id="password">
		<span class="va_password text-danger"></span>
  </div>
  <div class="form-group">
    <a href=""><u>Forgot password ?</u></a>
  </div>
  <button type="submit" class="btn btn-primary px-4">Login</button>
</form>
<p class="font-weight-bold">Don't have an account? <a href="<?=base_url('user/register')?>" class="text-danger">Register</a></p>
	</div>
</div>
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
<script>
	$(document).ready(function(){
		$("#logform").submit(function(e){
			e.preventDefault();
			var name=$("#name").val();
			var password=$("#password").val();
			var valid=true;
			//name
			var namepattern=/^[a-zA-Z][a-zA-Z0-9_]*$/;
			if(name.length==0)
			{
				$(".va_name").text("Please fill name field");
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

			//password
			if(password.length==0)
			{
				$(".va_password").text("Please fill password field");
				valid=false;
			}
			else
			{
				$(".va_password").text("");
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
