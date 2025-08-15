<?php

include 'partials/menu.php';

$query = "SELECT * FROM `categories` WHERE `featured` = 'yes' AND `active` = 'yes' LIMIT 3";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$query_menu = "SELECT * FROM `food` WHERE `featured` = 'yes' AND `active` = 'yes'";
$result_menu = mysqli_query($conn, $query_menu);

if (mysqli_num_rows($result_menu) > 0) {
    $all_food = mysqli_fetch_all($result_menu, MYSQLI_ASSOC);
}

?>

    <?php include 'partials/search.php'; ?>

    <!-- Categories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
			
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
            
            <?php if (! empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <a href="category-foods.php?id=<?= $category['id'] ?>">
                        <div class="box-3 float-container">
                            <img src="admin/uploads/category/<?= $category['image_name'] ?>" alt="<?= $category['title'] ?>" class="img-responsive img-curve">
            
                            <h3 class="float-text text-white"><?= $category['title'] ?></h3>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="box-3 float-container">
                    <p>No Category Found</p>
                </div>
            <?php endif; ?>
            
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

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
                            <a href="order.php?food_id=<?= $food['id'] ?>" class="btn btn-primary">Order Now</a>
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

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- food Menu Section Ends Here -->

<?php include 'partials/footer.php'; ?>
