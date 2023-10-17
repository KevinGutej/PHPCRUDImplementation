<?php

if (isset($_POST['read'])) {
    $sql = "SELECT * FROM users";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row['id'] . " - Name: " . $row['name'] . " - Email: " . $row['email'] . "<br>";
        }
    } else {
        echo "No records found.";
    }
}

$conn->close();
?>
