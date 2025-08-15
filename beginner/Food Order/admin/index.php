<?php include_once 'partials/menu.php' ?>
	
	<!-- Main Section Starts -->
	<div class="main-content">
		<div class="wrapper">
			<h1>Dashboard</h1>
            <br /> <br/>
			
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
   
			<div class="col-4 text-center">
				<h1>5</h1>
				<br />
				Categories
			</div>
			<div class="col-4 text-center">
				<h1>5</h1>
				<br />
				Categories
			</div>
			<div class="col-4 text-center">
				<h1>5</h1>
				<br />
				Categories
			</div>
			<div class="col-4 text-center">
				<h1>5</h1>
				<br />
				Categories
			</div>
			
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- Main Section Ends -->

<?php include_once 'partials/footer.php' ?>
