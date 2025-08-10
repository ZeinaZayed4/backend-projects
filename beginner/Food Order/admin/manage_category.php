<?php

include_once 'partials/menu.php';
require_once '../config/constants.php';

$query = "SELECT * FROM `categories`";
$result = mysqli_query($conn, $query);

$num = 1;

if (mysqli_num_rows($result) > 0) {
    $not_found = false;
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $not_found = true;
}

?>
	
	<!-- Main Section Starts -->
	<div class="main-content">
		<div class="wrapper">
		    <h1>Manage Category</h1>
            <br /> <br />
			
			<?php if (isset($_SESSION['success'])): ?>
                <p style="color: green"><?= $_SESSION['success']; unset($_SESSION['success']) ?></p><br /><br />
			<?php elseif (isset($_SESSION['error'])): ?>
                <p style="color: red"><?= $_SESSION['error']; unset($_SESSION['error']) ?></p><br /><br />
			<?php endif; ?>
            
            <a href="add_category.php" class="btn-primary">Add Category</a>
            <br /> <br /> <br />

            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                
                <?php if ($not_found): ?>
                    <p>No categories found!</p>
                <?php else: ?>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?= $num++ ?></td>
                            <td><?= $category['title'] ?></td>
                            <td>
								<?php if(! empty($category['image_name'])): ?>
                                    <img src="uploads/<?= $category['image_name'] ?>" width="75px" height="75px"></td>
                                <?php else: ?>
                                    <p style="color: red">No image was added!</p>
                                <?php endif; ?>
                            <td><?= $category['featured'] ?></td>
                            <td><?= $category['active'] ?></td>
                            <td>
                                <a href="#" class="btn-secondary">Update</a>
                                <a href="#" class="btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
		</div>
	</div>
	<!-- Main Section Ends -->

<?php include_once 'partials/footer.php' ?>
