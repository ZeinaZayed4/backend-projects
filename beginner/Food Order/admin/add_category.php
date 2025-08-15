<?php include_once 'partials/menu.php'; ?>

	<div class="main-content">
		<div class="wrapper">
			<h1>Add Category</h1>
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
   
			<form action="handle/handle_add_category.php" method="post" enctype="multipart/form-data">
                <label for="title" class="admin-label">Title: </label>
                <input type="text" name="title" class="input-responsive" id="title" placeholder="Enter category title">
                <br />
                <label for="image" class="admin-label">Image: </label>
                <input type="file" id="image" name="image" class="input-responsive">
                <br />
                <label for="featured" class="admin-label">Featured: </label>
                <input type="radio" name="featured" value="yes" id="featured" checked> Yes
                <input type="radio" name="featured" value="no" id="featured"> No
                <br /><br /><br />
                <label for="active" class="admin-label">Active: </label>
                <input type="radio" name="active" value="yes" id="active" checked> Yes
                <input type="radio" name="active" value="no" id="active"> No
                <br /> <br /><br />
                <button type="submit" name="submit" class="btn-secondary">Add Category</button>
			</form>
		</div>
	</div>

<?php include_once 'partials/footer.php' ?>
