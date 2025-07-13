<div class="container mt-5">
	<div class="card">
		<div class="card-header">
			<h3>
				<?php if($user['id']): ?>
					Update user <b><?= $user['name'] ?></b>
				<?php else: ?>
					Create new User
				<?php endif; ?>
			</h3>
		</div>
		<div class="card-body">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label for="name">Name</label>
					<input name="name" value="<?= $user['name'] ?>"
                           class="form-control <?= $errors['name'] ? 'is-invalid' : '' ?>" id="name">
                    <div class="invalid-feedback">
                        <?= $errors['name'] ?>
                    </div>
				</div>
				<div class="mb-3">
					<label for="username">Username</label>
					<input name="username" value="<?= $user['username'] ?>"
                           class="form-control <?= $errors['username'] ? 'is-invalid' : '' ?>" id="username">
                    <div class="invalid-feedback">
						<?= $errors['username'] ?>
                    </div>
				</div>
				<div class="mb-3">
					<label for="email">Email</label>
					<input name="email" value="<?= $user['email'] ?>"
                           class="form-control <?= $errors['email'] ? 'is-invalid' : '' ?>" id="email">
                    <div class="invalid-feedback">
						<?= $errors['email'] ?>
                    </div>
				</div>
				<div class="mb-3">
					<label for="phone">Phone</label>
					<input name="phone" value="<?= $user['phone'] ?>"
                           class="form-control <?= $errors['phone'] ? 'is-invalid' : '' ?>" id="phone">
                    <div class="invalid-feedback">
						<?= $errors['phone'] ?>
                    </div>
				</div>
				<div class="mb-3">
					<label for="website">Website</label>
					<input name="website" value="<?= $user['website'] ?>"
                           class="form-control <?= $errors['website'] ? 'is-invalid' : '' ?>" id="website">
                    <div class="invalid-feedback">
						<?= $errors['website'] ?>
                    </div>
				</div>
				<div class="mb-3">
					<label for="image">Image</label>
					<input type="file" name="image" value="<?= $user['website'] ?>" class="form-control-file" id="image">
				</div>
				<button type="submit" class="btn btn-success">Submit</button>
			</form>
		</div>
	</div>
</div>