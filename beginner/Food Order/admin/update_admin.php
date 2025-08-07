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
			<h1>Update Admin</h1>
			<br /><br />
			
			<form action="handle/handle_update_admin.php" method="post">
                <input type="hidden" name="id" value="<?= $admin['id'] ?>">
                <label for="full_name" class="admin-label">Full Name: </label>
                <input type="text" name="full_name" class="input-responsive" id="full_name" value="<?= $admin['full_name']?>">
                <br />
                <label for="username" class="admin-label">Username: </label>
                <input type="text" name="username" class="input-responsive" id="username" value="<?= $admin['username']?>">
                <br />
                <button type="submit" name="submit" class="btn-secondary">Update</button>
			</form>
		</div>
	</div>

<?php include_once 'partials/footer.php' ?>
