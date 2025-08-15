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
                <div style="padding: 2%; text-align: center">
                    <p style="color: green"><?= $_SESSION['success']; unset($_SESSION['success']) ?>
                    </p>
                </div>
			<?php elseif (isset($_SESSION['error'])): ?>
                <div style="padding: 2%; text-align: center">
                    <p style="color: red"><?= $_SESSION['error']; unset($_SESSION['error']) ?></p>
                </div>
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
                    <td>
                        <p style="color: red">No category found!</p>
                    </td>
                <?php else: ?>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?= $num++ ?></td>
                            <td><?= $category['title'] ?></td>
                            <td>
								<?php if(! empty($category['image_name'])): ?>
                                    <img src="uploads/category/<?= $category['image_name'] ?>" width="75px" height="75px" alt="">
                                <?php else: ?>
                                    <p style="color: red">No image was added!</p>
                                <?php endif; ?>
                            </td>
                            <td><?= $category['featured'] ?></td>
                            <td><?= $category['active'] ?></td>
                            <td>
                                <a href="update_category.php?id=<?= $category['id'] ?>" class="btn-secondary">Update</a>
                                <a href="handle/handle_delete_category.php?id=<?= $category['id'] ?>&image_name=<?= $category['image_name'] ?>" class="btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
		</div>
	</div>
	<!-- Main Section Ends -->

<?php include_once 'partials/footer.php' ?>
