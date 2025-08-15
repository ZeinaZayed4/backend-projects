<?php

include_once 'partials/menu.php';
require_once '../config/constants.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "SELECT * FROM `admins` WHERE `id` = $id";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) === 1) {
        $admin = mysqli_fetch_assoc($result);
    } else {
		header("Location: manage_admin.php");
    }
} else {
    header("Location: manage_admin.php");
}

?>

	<div class="main-content">
		<div class="wrapper">
			<h1>Change Password</h1>
			<br /><br />
			
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
			
			<form action="handle/handle_update_password.php" method="post">
                <input type="hidden" name="id" value="<?= $admin['id'] ?>">
                <label for="current_password" class="admin-label">Current Password: </label>
                <input type="password" name="current_password" class="input-responsive" id="current_password">
                <br />
                <label for="new_password" class="admin-label">New Password: </label>
                <input type="password" name="new_password" class="input-responsive" id="new_password">
                <br />
                <label for="confirm_password" class="admin-label">Confirm Password: </label>
                <input type="password" name="confirm_password" class="input-responsive" id="confirm_password">
                <br />
                <button type="submit" name="submit" class="btn-secondary">Change</button>
			</form>
		</div>
	</div>

<?php include_once 'partials/footer.php' ?>
