<?php include_once 'partials/menu.php'; ?>

	<div class="main-content">
		<div class="wrapper">
			<h1>Add Admin</h1>
			<br /><br />
			
			<form action="handle/handle_add_admin.php" method="post">
				<table class="tbl-50">
					<tr>
						<td>Full Name: </td>
						<td>
							<input type="text" name="full_name" class="input-responsive" placeholder="Enter your name">
						</td>
					</tr>
					<tr>
						<td>Username: </td>
						<td>
							<input type="text" name="username" class="input-responsive" placeholder="Enter your username">
						</td>
					</tr>
					<tr>
						<td>Password: </td>
						<td>
							<input type="password" name="password" class="input-responsive" placeholder="Enter your password">
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<button type="submit" name="submit" class="btn-secondary">Add</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>

<?php include_once 'partials/footer.php' ?>
