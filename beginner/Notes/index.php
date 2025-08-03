<?php

require_once 'Connection.php';

$connection = new Connection();

$notes = $connection->getNotes();

$currentNote = ['id' => '', 'title' => '', 'description' => ''];
if (isset($_GET['id'])) {
    $currentNote = $connection->getNoteById($_GET['id']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modern Notes - Pure CSS</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
	<div class="header">
		<div class="floating-elements"></div>
		<h1>Notes</h1>
	</div>
	
	<div class="content">
		<div class="form-section">
			<h2>Create New Note</h2>
			<form action="save.php" method="POST">
                <input type="hidden" name="id" value="<?= $currentNote['id'] ?>">
				<div class="form-group">
					<label for="noteTitle">Note Title</label>
					<input type="text" name="title" id="noteTitle" placeholder="Enter your brilliant idea..."
                           required value="<?= $currentNote['title'] ?>">
				</div>
				
				<div class="form-group">
					<label for="noteDescription">Note Content</label>
					<textarea id="noteDescription" name="description" placeholder="Describe your thoughts in detail..."
                              required><?= $currentNote['description'] ?></textarea>
				</div>
				
				<button type="submit" name="submit" class="btn">
                    <?php if ($currentNote['id']): ?>
                        Update Note
                    <?php else: ?>
                        Create Note
                    <?php endif; ?>
                </button>
			</form>
		</div>
		
		<div class="notes-section">
            <h2>Your Notes Collection</h2>
                <div class="notes-grid">
                    <?php if (! empty($notes)): ?>
                        <?php foreach ($notes as $note): ?>
                            <div class="note-card sample-note">
                                <form action="delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                                    <button type="submit" class="delete-btn">&times;</button>
                                </form>
                                <h3>
                                    <a href="?id=<?= $note['id'] ?>" style="color: #2d3436; text-underline-mode: none"><?= $note['title']?></a>
                                </h3>
                                <p><?= $note['description'] ?></p>
                                <div class="timestamp"><?= $note['created_at'] ?></div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <p>No notes yet. Create your first note!</p>
                        </div>
                    <?php endif; ?>
                </div>
		</div>
	</div>
</div>
</body>
</html>