<?php

include_once 'partials/menu.php';
require_once '../config/constants.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "SELECT * FROM `food` WHERE `id` = $id";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) === 1) {
        $food = mysqli_fetch_assoc($result);
		
		$query = "SELECT * FROM `categories` WHERE `active` = 'yes'";
		$result = mysqli_query($conn, $query);
		
		if (mysqli_num_rows($result) > 0) {
			$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
		}
    } else {
        $_SESSION['error'] = 'No food found';
        header('Location: manage_food.php');
        exit();
    }
}

?>

	<div class="main-content">
		<div class="wrapper">
			<h1>Update Food</h1>
			<br /><br />
			
			<?php if (isset($_SESSION['success'])): ?>
                <p style="color: green"><?= $_SESSION['success']; unset($_SESSION['success']) ?></p><br /><br />
			<?php elseif (isset($_SESSION['error'])): ?>
                <p style="color: red"><?= $_SESSION['error']; unset($_SESSION['error']) ?></p><br /><br />
			<?php endif; ?>
   
			<form action="handle/handle_update_food.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="current_image" value="<?= $food['image_name'] ?>">
                <input type="hidden" name="id" value="<?= $food['id'] ?>">
                
                <label for="title" class="admin-label">Title: </label>
                <input type="text" name="title" class="input-responsive" id="title" value="<?= $food['title'] ?>">
                <br />
                
                <label for="description" class="admin-label">Description: </label>
                <br />
                <textarea name="description" class="input-responsive" id="description" cols="10" rows="5"><?= $food['description'] ?></textarea>
                <br />

                <label for="price" class="admin-label">Price: </label>
                <input type="number" name="price" class="input-responsive" id="price" value="<?= $food['price'] ?>">
                <br />
                
                <label class="admin-label">Current Image: </label>
				<?php if (empty($food['image_name'])): ?>
                    <p style="color: red">No image was added!</p>
				<?php else: ?>
                    <img src="uploads/food/<?= $food['image_name'] ?>" alt="<?= $food['title'] ?>" width="75px" height="75px">
				<?php endif; ?>
                <br />

                <label for="new_image" class="admin-label">New Image: </label>
                <input type="file" id="new_image" name="image" class="input-responsive">
                <br />

                <label for="category" class="admin-label">Category: </label>
                <select id="category" name="category" class="input-responsive">
                    <?php if (! empty($categories)): ?>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="0">No categories found</option>
                    <?php endif; ?>
                </select>
                <br />
                
                <label for="featured" class="admin-label">Featured: </label>
                <input type="radio" name="featured" value="yes" id="featured" <?= ($food['featured'] == 'yes') ? 'checked' : '' ?>> Yes
                <input type="radio" name="featured" value="no" id="featured" <?= ($food['featured'] == 'no') ? 'checked' : '' ?>> No
                <br /><br />
                
                <label for="active" class="admin-label">Active: </label>
                <input type="radio" name="active" value="yes" id="active" <?= ($food['active'] == 'yes') ? 'checked' : '' ?>> Yes
                <input type="radio" name="active" value="no" id="active" <?= ($food['active'] == 'no') ? 'checked' : '' ?>> No
                <br /><br />
                
                <button type="submit" name="submit" class="btn-secondary">Update Food</button>
			</form>
		</div>
	</div>

<?php include_once 'partials/footer.php' ?>
