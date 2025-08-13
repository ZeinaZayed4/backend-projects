<?php

require_once '../config/constants.php';
include_once 'partials/menu.php';

$num = 1;

$query = "SELECT `food`.*, `categories`.title AS `category_title` FROM `food` JOIN `categories` ON food.category_id = categories.id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
	$allFood = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>

	<!-- Main Section Starts -->
	<div class="main-content">
		<div class="wrapper">
			<h1>Manage Food</h1>
            <br/> <br/>
			
			<?php if (isset($_SESSION['success'])): ?>
                <p style="color: green"><?= $_SESSION['success']; unset($_SESSION['success']) ?></p><br /><br />
			<?php elseif (isset($_SESSION['error'])): ?>
                <p style="color: red"><?= $_SESSION['error']; unset($_SESSION['error']) ?></p><br /><br />
			<?php endif; ?>

            <a href="add_food.php" class="btn-primary">Add Food</a>
            <br /> <br /> <br />

            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

                <?php if (! empty($allFood)): ?>
                    <?php foreach ($allFood as $food): ?>
                        <tr>
                            <td><?= $num++ ?></td>
                            <td><?= $food['title'] ?></td>
                            <td><?= $food['description'] ?></td>
                            <td><?= $food['price'] ?></td>
                            <td>
								<?php if(! empty($food['image_name'])): ?>
                                    <img src="uploads/food/<?= $food['image_name'] ?>" width="75px" height="75px" alt="">
								<?php else: ?>
                                    <p style="color: red">No image was added!</p>
								<?php endif; ?>
                            </td>
                            <td><?= $food['category_title'] ?></td>
                            <td><?= $food['featured'] ?></td>
                            <td><?= $food['active'] ?></td>
                            <td>
                                <a href="update_food.php?id=<?= $food['id'] ?>" class="btn-secondary">Update</a>
                                <a href="handle/handle_delete_food.php?id=<?= $food['id'] ?>&image_name=<?= $food['image_name'] ?>" class="btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <td>
                        <p style="color: red">No food found!</p>
                    </td>
                <?php endif; ?>
            </table>
		</div>
	</div>
	<!-- Main Section Ends -->

<?php include_once 'partials/footer.php' ?>
