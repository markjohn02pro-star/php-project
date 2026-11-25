
<?php
include 'db.php';

$result = $conn->query(
    "SELECT * FROM notes ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Notes</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>My Notes 📝</h1>

    <form action="save.php" method="POST">

        <input
            type="text"
            name="title"
            placeholder="Enter Note Title"
            required
        >

        <textarea
            name="content"
            placeholder="Write Your Notes Here..."
            required
        ></textarea>

        <button type="submit">
            + Add Notes
        </button>

    </form>

    <h2>Your Saved Notes</h2>

    <div class="notes-container">

        <?php while($row = $result->fetch_assoc()) { ?>

            <div class="note">

                <h3>
                    <?php echo htmlspecialchars($row['title']); ?>
                </h3>

                <p>
                    <?php echo nl2br(htmlspecialchars($row['content'])); ?>
                </p>

                <small>
                    <?php echo $row['created_at']; ?>
                </small>

                <br><br>

                <a href="delete.php?id=<?php echo $row['id']; ?>"
                   onclick="return confirm('Delete this note?')">
                    Delete
                </a>

            </div>

        <?php } ?>

    </div>

</div>

</body>
</html>