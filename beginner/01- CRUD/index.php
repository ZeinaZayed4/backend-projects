<?php

include 'partials/header.php';
require 'users/users.php';

$users = getUsers();

?>

<div class="container mt-5">
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['name'] ?></td>
                <td>
                    <?php if(isset($user['extension'])): ?>
                        <img src="<?= "/users/images/{$user['id']}.{$user['extension']}" ?>"
                             alt="<?= $user['name'] ?>" width="60">
                    <?php endif;?>
                </td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['phone'] ?></td>
                <td>
                    <a href="https://<?= $user['website'] ?>" target="_blank">
                        <?= $user['website'] ?>
                    </a>
                </td>
                <td>
                    <a href="view.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-outline-info">View</a>
                    <a href="update.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-outline-secondary">Update</a>
                    <form action="delete.php" method="post" style="display: inline-block">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td>
                <a class="btn btn-outline-success" href="create.php">Create new User</a>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<?php include 'partials/footer.php';
