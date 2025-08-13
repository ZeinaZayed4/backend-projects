<?php

include 'partials/menu.php';

$query = "SELECT * FROM `food` WHERE `active` = 'yes'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $all_food = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>

    <?php include 'partials/search.php'; ?>

    <!-- food Menu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
			
			<?php if (! empty($all_food)): ?>
				<?php foreach ($all_food as $food): ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <img src="admin/uploads/food/<?= $food['image_name'] ?>" alt="<?= $food['title'] ?>" class="img-responsive img-curve">
                        </div>

                        <div class="food-menu-desc">
                            <h4><?= $food['title'] ?></h4>
                            <p class="food-price">$<?= $food['price'] ?></p>
                            <p class="food-detail">
								<?= $food['description'] ?>
                            </p>
                            <br>
                            <a href="order.php" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
				<?php endforeach; ?>
			<?php else: ?>
                <div class="food-menu-box">
                    <div class="food-menu-desc">
                        <p>No Food Found</p>
                    </div>
                </div>
			<?php endif; ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- food Menu Section Ends Here -->

<?php include 'partials/footer.php'; ?>
