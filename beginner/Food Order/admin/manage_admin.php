<?php

require_once '../config/constants.php';
include_once 'partials/menu.php';

$num = 1;

$query = "SELECT * FROM `admins`";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $data_exists = true;
    $admins = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $data_exists = false;
}

?>
	
	<!-- Main Section Starts -->
	<div class="main-content">
		<div class="wrapper">
			<h1>Manage Admin</h1>
            <br /> <br/>
			
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

            <a href="add_admin.php" class="btn-primary">Add Admin</a>
            <br /> <br /> <br />
            
            <table class="tbl-full">
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
                
                <?php if ($data_exists): ?>
                    <?php foreach ($admins as $admin): ?>
                        <tr>
                            <td><?= $num++; ?></td>
                            <td><?= $admin['full_name'] ?></td>
                            <td><?= $admin['username'] ?></td>
                            <td>
                                <a href="update_password.php?id=<?= $admin['id'] ?>" class="btn-primary">Change Password</a>
                                <a href="update_admin.php?id=<?= $admin['id'] ?>" class="btn-secondary">Update</a>
                                <a href="handle/handle_delete_admin.php?id=<?= $admin['id'] ?>" class="btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php else: ?>
                    <p>No Data Found</p>
                <?php endif; ?>
            </table>
		</div>
	</div>
	<!-- Main Section Ends -->
	
<?php include_once 'partials/footer.php' ?>
