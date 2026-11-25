
<?php

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title !== "" && $content !== "") {

        $stmt = $conn->prepare(
            "INSERT INTO notes (title, content)
             VALUES (?, ?)"
        );

        $stmt->bind_param("ss", $title, $content);

        $stmt->execute();

        $stmt->close();
    }
}

header("Location: index.php");
exit();

?>