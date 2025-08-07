<?php include_once 'partials/menu.php'; ?>

	<div class="main-content">
		<div class="wrapper">
			<h1>Add Admin</h1>
			<br /><br />
			
			<form action="handle/handle_add_admin.php" method="post">
                <label for="full_name" class="admin-label">Full Name: </label>
                <input type="text" name="full_name" class="input-responsive" id="full_name" placeholder="Enter your name">
                <br />
                <label for="username" class="admin-label">Username: </label>
                <input type="text" name="username" class="input-responsive" id="username" placeholder="Enter your username">
                <br />
                <label for="password" class="admin-label">Password: </label>
                <input type="password" name="password" class="input-responsive" id="password" placeholder="Enter your password">
                <br />
                <button type="submit" name="submit" class="btn-secondary">Add</button>
			</form>
		</div>
	</div>

<?php include_once 'partials/footer.php' ?>
