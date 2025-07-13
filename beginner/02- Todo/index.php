<?php

$todos = [];
if (file_exists('todo.json')) {
	$json = file_get_contents('todo.json');
	$todos = json_decode($json, true);
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Todo</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
	<section class="vh-100" style="background-color: #e2d5de;">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col col-xl-10">
					<div class="card" style="border-radius: 15px;">
						<div class="card-body p-5">
							<h6 class="mb-3">Awesome Todo List</h6>
							<form action="add.php" method="post" class="d-flex justify-content-center align-items-center mb-4">
								<div data-mdb-input-init class="form-outline flex-fill">
									<input type="text" name="todo_name" id="form" class="form-control" placeholder="What do you need to do today?" />
								</div>
								<button type="submit" name="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary ms-2">New Todo</button>
							</form>
							<ul class="list-group mb-0">
                                <?php
                                if(!empty($todos)):
                                    foreach ($todos as $todoName => $todo): ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2">
                                            <div class="d-flex align-items-center">
                                                <form action="change_status.php" method="post">
                                                    <input type="hidden" name="todo_name" value="<?= $todoName ?>">
                                                    <input class="form-check-input me-2" <?= $todo['completed'] ? 'checked' : '' ?> type="checkbox" value="" aria-label="..." />
                                                </form>
                                                <?= $todoName ?>
                                            </div>
                                            <form action="delete.php" method="post" style="display: inline-block">
                                                <input type="hidden" name="todo_name" value="<?= $todoName ?>">
                                                <button type="submit" name="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger ms-2">Delete</button>
                                            </form>
                                        </li>
                                <?php endforeach; endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox]');
        checkboxes.forEach(ch => {
            ch.onclick = function () {
                this.parentNode.submit();
            }
        });
    </script>
</body>
</html>
