<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Confirm payment</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
	body
	{
		height:100vh;
		background-color:lightgray;
	}
</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 offset-md-4">
<div class="card mt-5">
<div class="card-body">
<h3 class="text-center text-primary mt-3">Confirm Payment</h3>
			<form action="" method="post" autocomplete="off">
			<div class="form-group">
    <input type="hidden" class="form-control" value="<?=$_GET['id']?>" placeholder="Enter Order id" name="order_id" id="email" required readonly>
  </div>
  <div class="form-group">
    <label for="email">Invoice no:</label>
    <input type="number" class="form-control" placeholder="Enter Invoice no" value="<?=$order->invoice_no?>" name="invoice_no" id="email" required readonly>
  </div>
	<div class="form-group">
    <input type="hidden" class="form-control" placeholder="Enter User Id" value="<?=$this->session->userdata("uid")?>" name="user_id" id="email" required readonly>
  </div>
  <div class="form-group">
    <label for="pwd">Amount:</label>
    <input type="number" class="form-control" placeholder="Enter amount" value="<?=$order->amount_due?>" name="amount" id="pwd" required readonly>
  </div>
  <div class="form-group">
  <select class="form-control" name="payment_mode" id="sel1" required>
    <option value="">Select payment mode</option>
    <option value="Offline">Offline</option>
    <option value="UPI">UPI</option>
    <option value="Net banking">Net banking</option>
    <option value="Paypal">Paypal</option>
    <option value="Cash on Delivery">Cash on Delivery</option>
  </select>
</div>
  <input type="submit" class="btn btn-primary" value="Confirm" name="confirm">
</form>
</div>
</div>
			</div>
		</div>
	</div>
</body>
</html>
