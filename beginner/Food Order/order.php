<?php

include 'partials/menu.php';

if (! empty($_GET['food_id'])) {
    $food_id = $_GET['food_id'];
    
    $query = "SELECT * FROM `food` WHERE `id` = $food_id";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) === 1) {
        $food = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['error'] = 'Food not found';
		header("Location: index.php");
		exit();
    }
} else {
    header("Location: index.php");
    exit();
}

?>

    <!-- food Search Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="handle/handle_order.php" method="post" class="order">
                <input type="hidden" name="food_title" value="<?= $food['title'] ?>">
                <input type="hidden" name="food_price" value="<?= $food['price'] ?>">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="admin/uploads/food/<?= $food['image_name'] ?>" alt="<?= $food['title'] ?>" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?= $food['title'] ?></h3>
                        <p class="food-price">$<?= $food['price'] ?></p>

                        <div class="order-label">Quantity</div>
                        <label>
                            <input type="number" name="quantity" class="input-responsive" value="1" required>
                        </label>
                    </div>
                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <label>
                        <input type="text" name="full_name" placeholder="E.g. Anybody" class="input-responsive" required>
                    </label>

                    <div class="order-label">Phone Number</div>
                    <label>
                        <input type="tel" name="phone" placeholder="E.g. 0101234567" class="input-responsive" required>
                    </label>

                    <div class="order-label">Email</div>
                    <label>
                        <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>
                    </label>

                    <div class="order-label">Address</div>
                    <label>
                        <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
                    </label>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>
            </form>
        </div>
    </section>
    <!-- food Search Section Ends Here -->

<?php include 'partials/footer.php'; ?>
