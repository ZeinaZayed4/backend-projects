<?php

include_once 'partials/menu.php';
require_once '../config/constants.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	
	$query = "SELECT * FROM `orders` WHERE `id` = $id";
	$result = mysqli_query($conn, $query);
	
	if (mysqli_num_rows($result) === 1) {
		$order = mysqli_fetch_assoc($result);
	} else {
		$_SESSION['error'] = 'Order not found';
		header("Location: manage_order.php");
		exit();
	}
} else {
	header("Location: manage_order.php");
	exit();
}

?>

<div class="main-content">
	<div class="wrapper">
		<h1>Update Order</h1>
		<br /><br />
		
		<form action="handle/handle_update_order.php" method="post">
			<input type="hidden" name="id" value="<?= $order['id'] ?>">
			<input type="hidden" name="price" value="<?= $order['price'] ?>">
			
			<p style="display: inline" class="admin-label">Food: </p>
			<p style="display: inline"><?= $order['food'] ?></p>
			<br /><br />
			
			<p style="display: inline" class="admin-label">Price: </p>
			<p style="display: inline">$<?= $order['price'] ?></p>
			<br /><br />
			
			<label for="quantity" class="admin-label">Quantity: </label>
			<input type="number" name="quantity" class="input-responsive" id="quantity" value="<?= $order['quantity'] ?>">
			<br />
			
			<label for="status" class="admin-label">Status: </label>
			<select id="status" name="status" class="input-responsive">
				<option <?= ($order['status'] == 'Ordered') ? 'selected' : '' ?> value="Ordered">Ordered</option>
				<option <?= ($order['status'] == 'On Delivery') ? 'selected' : '' ?> value="On Delivery">On Delivery</option>
				<option <?= ($order['status'] == 'Delivered') ? 'selected' : '' ?> value="Delivered">Delivered</option>
				<option <?= ($order['status'] == 'Cancelled') ? 'selected' : '' ?> value="Cancelled">Cancelled</option>
			</select>
			<br />
			
			<label for="name" class="admin-label">Customer Name: </label>
			<input type="text" name="name" class="input-responsive" id="name" value="<?= $order['customer_name'] ?>">
			<br />
			
			<label for="phone" class="admin-label">Customer Phone: </label>
			<input type="text" name="phone" class="input-responsive" id="phone" value="<?= $order['customer_contact'] ?>">
			<br />
			
			<label for="email" class="admin-label">Customer Email: </label>
			<input type="text" name="email" class="input-responsive" id="email" value="<?= $order['customer_email'] ?>">
			<br />
			
			<label for="address" class="admin-label">Customer Address: </label>
			<input type="text" name="address" class="input-responsive" id="address" value="<?= $order['customer_address'] ?>">
			<br />
			
			<button type="submit" name="submit" class="btn-secondary">Update Order</button>
		</form>
	</div>
</div>

<?php include_once 'partials/footer.php' ?>
