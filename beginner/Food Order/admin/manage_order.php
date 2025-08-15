<?php

include_once 'partials/menu.php';
require_once '../config/constants.php';

$query = "SELECT * FROM `orders` ORDER BY `id` DESC";
$result = mysqli_query($conn, $query);

$num = 1;

if (mysqli_num_rows($result) > 0) {
    $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $error = "No orders available";
}

?>

	<!-- Main Section Starts -->
	<div class="main-content">
		<div class="wrapper">
			<h1>Manage Order</h1>
            <br/> <br/>
			
			<?php if (isset($_SESSION['success'])): ?>
                <div style="padding: 2%; text-align: center">
                    <p style="color: green"><?= $_SESSION['success']; unset($_SESSION['success']) ?>
                    </p>
                </div>
			<?php elseif (isset($_SESSION['error'])): ?>
                <div style="padding: 2%; text-align: center">
                    <p style="color: red"><?= $_SESSION['error']; unset($_SESSION['error']) ?></p>
                </div>
			<?php endif; ?>
            
            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
                
                <?php if (isset($error)): ?>
                <tr>
                    <td colspan="12">
                        <div style="text-align: center; color: red"><?= $error ?></div>
                    </td>
                </tr>
                <?php else: ?>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= $num++ ?></td>
                            <td><?= $order['food'] ?></td>
                            <td>$<?= $order['price'] ?></td>
                            <td><?= $order['quantity'] ?></td>
                            <td>$<?= $order['total'] ?></td>
                            <td><?= $order['order_date'] ?></td>
                            <td>
                                <?php if ($order['status'] == 'Ordered'): ?>
                                <?= $order['status'] ?>
                                <?php elseif ($order['status'] == 'On Delivery'): ?>
                                    <p style="color: orange"><?= $order['status'] ?></p>
                                <?php elseif ($order['status'] == 'Delivered'): ?>
                                    <p style="color: green"><?= $order['status'] ?></p>
								<?php elseif ($order['status'] == 'Cancelled'): ?>
                                    <p style="color: red"><?= $order['status'] ?></p>
                                <?php endif; ?>
                                
                            </td>
                            <td><?= $order['customer_name'] ?></td>
                            <td><?= $order['customer_contact'] ?></td>
                            <td><?= $order['customer_email'] ?></td>
                            <td><?= $order['customer_address'] ?></td>
                            <td>
                                <a href="update_order.php?id=<?= $order['id'] ?>" class="btn-secondary">Update</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
		</div>
	</div>
	<!-- Main Section Ends -->

<?php include_once 'partials/footer.php' ?>
