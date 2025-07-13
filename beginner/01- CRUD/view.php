<?php

include 'partials/header.php';
require __DIR__ . '/users/users.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$user = getUserById($id);
	
	if (!$user) {
		include 'partials/not_found.php';
		exit();
	}
} else {
	include 'partials/not_found.php';
	exit();
}

?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>View User: <b><?= $user['name'] ?></b></h3>
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <th>Name:</th>
                    <td><?= $user['name'] ?></td>
                </tr>
                <tr>
                    <th>Username:</th>
                    <td><?= $user['username'] ?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?= $user['email'] ?></td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td><?= $user['phone'] ?></td>
                </tr>
                <tr>
                    <th>Website:</th>
                    <td>
                        <a href="https://<?= $user['website'] ?>" target="_blank"><?= $user['website']; ?>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Actions:</th>
                    <td>
                        <a href="update.php?id=<?= $user['id']; ?>" class="btn btn-secondary">Update</a>
                        <form action="delete.php" method="post" style="display: inline-block">
                            <input type="hidden" name="id" value="<?= $user['id']; ?>">
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include 'partials/footer.php';