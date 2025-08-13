<?php include 'partials/menu.php'; ?>

    <!-- food Search Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="#" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="images/menu-pizza.jpg" alt="Chicken Pizza" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3>Food Title</h3>
                        <p class="food-price">$2.3</p>

                        <div class="order-label">Quantity</div>
                        <label>
                            <input type="number" name="qty" class="input-responsive" value="1" required>
                        </label>
                    </div>
                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <label>
                        <input type="text" name="full-name" placeholder="E.g. Anybody" class="input-responsive" required>
                    </label>

                    <div class="order-label">Phone Number</div>
                    <label>
                        <input type="tel" name="contact" placeholder="E.g. 0101234567" class="input-responsive" required>
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
