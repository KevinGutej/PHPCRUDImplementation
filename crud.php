<?php


$servername = "localhost";
$username = "root";
$password = "password123";
$dbname = "CRUD";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Problem with connecting,  " . $conn->connect_error);
}

if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === true) {
        echo "Record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();





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
