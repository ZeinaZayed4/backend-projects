<?php

include 'partials/menu.php';

if (! empty($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "SELECT food.*, `categories`.`title` AS `category_title`
              FROM `food`
              JOIN `categories` ON `food`.`category_id` = `categories`.`id`
              WHERE `food`.`category_id` = $id";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $foodAndCategoryTitle = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
} else {
    header("Location: index.php");
    exit();
}

?>

    <!-- Food Search Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <h2>Foods on <a href="#" class="text-white">"<?= (! empty($foodAndCategoryTitle)) ? $foodAndCategoryTitle[0]['category_title'] : '' ?>"</a></h2>
        </div>
    </section>
    <!-- Food Search Section Ends Here -->

    <!-- food Menu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
			
			<?php if (! empty($foodAndCategoryTitle)): ?>
                <?php foreach ($foodAndCategoryTitle as $food): ?>
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
                    <p style="color: red">Food Not Found</p>
                </div>
            <?php endif; ?>
            
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- food Menu Section Ends Here -->

<?php include 'partials/footer.php'; ?>
