
<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "my_notes"
);

if ($conn->connect_error) {
    die("Database Connection Failed");
}

?>