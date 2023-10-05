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
		<div class="col-md-10 offset-md-1 mb-3">
			<h3 class="text-center font-weight-bold text-info">All orders</h3>
			<table border="1" class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>S.No</th>
						<th>Order Id</th>
						<th>Amount Due</th>
						<th>Total products</th>
						<th>Invoice no</th>
						<th>Status</th>
						<th>UserId</th>
						<th>Order time</th>
					</tr>
                </thead>
<?php
$i=1;
foreach($orders as $order)
{
?>
				<tr>
					<td><?=$i?></td>
					<td><?=$order->oid?></td>
					<td><?=$order->amount_due?></td>
					<td><?=$order->total_products?></td>
					<td><?=$order->invoice_no?></td>
					<td><?=$order->status?></td>
					<td>
					<?php
					if($order->user_id==0)
					{
						echo "Guest";
					}
					else
					{
					foreach($users as $user)
					{
						if($order->user_id==$user->uid)
						{
							echo $user->name;
						}
						else
						{

						}
					}
				    }
					?>
					</td>
					<td><?=$order->reading_time?></td>
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
