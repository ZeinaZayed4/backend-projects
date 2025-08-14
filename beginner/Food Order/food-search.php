<?php

include 'partials/menu.php';

if (isset($_POST['submit'])) {
    $search = trim($_POST['search']);
    
    $query = "SELECT * FROM `food` WHERE `title` LIKE '%$search%' OR `description` LIKE '%$search%'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $all_food = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

?>

    <!-- food Search Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <h2>Foods on Your Search <a href="#" class="text-white">"<?= $search ?>"</a></h2>
        </div>
    </section>
    <!-- food Search Section Ends Here -->

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
    
                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
            <div class="food-menu-box">
                <p style="color: red">Food Not Found</p>
            </div>
            <?php endif; ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- food Menu Section Ends Here -->

<?php include 'partials/footer.php'; ?>
