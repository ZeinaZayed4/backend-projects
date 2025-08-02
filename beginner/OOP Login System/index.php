<?php
include_once 'partials/nav.php';
include_once 'partials/header.php';

?>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <?php if (isset($_SESSION['user_id'])): ?>
            <p class="text-lg mt-10 text-center">Welcome to the dashboard!</p>
        <?php endif;?>
    </div>

<?php include_once 'partials/footer.php' ?>
