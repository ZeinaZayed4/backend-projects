<?php

include_once 'partials/menu.php';
require_once '../config/constants.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "SELECT * FROM `categories` WHERE `id` = $id";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) === 1) {
        $category = mysqli_fetch_assoc($result);
    } else {
		$_SESSION['error'] = 'Category not found';
		header("Location: manage_category.php");
    }
} else {
    header("Location: manage_category.php");
}

?>

	<div class="main-content">
		<div class="wrapper">
			<h1>Update Category</h1>
			<br /><br />
			
			<form action="handle/handle_update_category.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="current_image" value="<?= $category['image_name'] ?>">
                <input type="hidden" name="id" value="<?= $category['id'] ?>">
                
                <label for="title" class="admin-label">Title: </label>
                <input type="text" name="title" class="input-responsive" id="title" value="<?= $category['title'] ?>">
                <br />
                
                <label class="admin-label">Current Image: </label>
                <br/>
                <?php if (empty($category['image_name'])): ?>
                    <p style="color: red">No image was added!</p>
                <?php else: ?>
                    <img src="uploads/<?= $category['image_name'] ?>" alt="<?= $category['title'] ?>" width="75px" height="75px">
                <?php endif; ?>
                <br />
                
                <label for="image" class="admin-label">New Image:</label>
                <input type="file" id="image" name="image" class="input-responsive">
                <br />
                
                <label for="featured" class="admin-label">Featured: </label>
                <input type="radio" name="featured" value="yes" id="featured" <?= ($category['featured'] == 'yes') ? 'checked' : '' ?>> Yes
                <input type="radio" name="featured" value="no" id="featured" <?= ($category['featured'] == 'no') ? 'checked' : '' ?>> No
                <br /><br /><br />
                
                <label for="active" class="admin-label">Active: </label>
                <input type="radio" name="active" value="yes" id="active" <?= ($category['active'] == 'yes') ? 'checked' : '' ?>> Yes
                <input type="radio" name="active" value="no" id="active" <?= ($category['active'] == 'no') ? 'checked' : '' ?>> No
                <br /> <br /><br />
                
                <button type="submit" name="submit" class="btn-secondary">Update Category</button>
			</form>
		</div>
	</div>

<?php include_once 'partials/footer.php' ?>
