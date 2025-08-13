<?php

include 'partials/menu.php';

$query = "SELECT * FROM `categories` WHERE `active` = 'yes'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
	$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>

    <!-- Categories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
			
			<?php if (! empty($categories)): ?>
				<?php foreach ($categories as $category): ?>
                    <a href="#">
                        <div class="box-3 float-container">
                            <img src="admin/uploads/category/<?= $category['image_name'] ?>" alt="<?= $category['title'] ?>" class="img-responsive img-curve">

                            <h3 class="float-text text-white"><?= $category['title'] ?></h3>
                        </div>
                    </a>
				<?php endforeach; ?>
			<?php else: ?>
                <div class="box-3 float-container">
                    <img src="https://placehold.co/40x40" alt="" class="img-responsive img-curve">

                    <h3 class="float-text text-white">No Category Found</h3>
                </div>
			<?php endif; ?>
            
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

<?php include 'partials/footer.php'; ?>
