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
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row['id'] . " - Name: " . $row['name'] . " - Email: " . $row['email'] . "<br>";
        }
    } else {
        echo "No records found.";
    }
}

$conn->close();

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $newFirstName = $_POST['newFirstName'];
    $newSurname = $_POST['newSurname'];

    $sql = "UPDATE users SET name='$newFirstName', email='$newSurname' WHERE id=$id";

    if ($conn->query($sql) === true) {
        echo "Successfully updated.";
    } else {
        echo "Having issues with updating" . $conn->error;
    }
}
$conn->close();

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];

    $sql = "DELETE FROM users WHERE id=$id AND email=$email";

    if ($conn->query($sql) === true) {
        echo "Successfully deleted";
    } else {
        echo "Error with deleting " . $conn->error;
    }
}

$conn->close();
