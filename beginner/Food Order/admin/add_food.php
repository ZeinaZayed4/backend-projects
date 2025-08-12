<?php

include_once 'partials/menu.php';
require_once '../config/constants.php';

$query = "SELECT * FROM `categories` WHERE `active` = 'yes'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
}


?>

	<div class="main-content">
		<div class="wrapper">
			<h1>Add Food</h1>
			<br /><br />
			
			<?php if (isset($_SESSION['success'])): ?>
                <p style="color: green"><?= $_SESSION['success']; unset($_SESSION['success']) ?></p><br /><br />
			<?php elseif (isset($_SESSION['error'])): ?>
                <p style="color: red"><?= $_SESSION['error']; unset($_SESSION['error']) ?></p><br /><br />
			<?php endif; ?>
   
			<form action="handle/handle_add_food.php" method="post" enctype="multipart/form-data">
                <label for="title" class="admin-label">Title: </label>
                <input type="text" name="title" class="input-responsive" id="title" placeholder="Enter food title">
                <br />
                
                <label for="description" class="admin-label">Description: </label>
                <br />
                <textarea name="description" class="input-responsive" id="description" cols="10" rows="5" placeholder="Food Description"></textarea>
                <br />

                <label for="price" class="admin-label">Price: </label>
                <input type="number" name="price" class="input-responsive" id="price">
                <br />
                
                <label for="image" class="admin-label">Image: </label>
                <input type="file" id="image" name="image" class="input-responsive">
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
                <input type="radio" name="featured" value="yes" id="featured" checked> Yes
                <input type="radio" name="featured" value="no" id="featured"> No
                <br /><br />
                
                <label for="active" class="admin-label">Active: </label>
                <input type="radio" name="active" value="yes" id="active" checked> Yes
                <input type="radio" name="active" value="no" id="active"> No
                <br /><br />
                
                <button type="submit" name="submit" class="btn-secondary">Add Food</button>
			</form>
		</div>
	</div>

<?php include_once 'partials/footer.php' ?>
