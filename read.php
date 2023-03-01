<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "my_database");

// Check for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select all items from the database
$sql = "SELECT * FROM items";
$result = $conn->query($sql);

// Display the items and their QR codes
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . "<br>";
        echo "Name: " . $row['name'] . "<br>";
        echo "Description: " . $row['description'] . "<br>";
        echo "QR code: <img src='" . $row['qr_code'] . "'><br><br>";
    }
} else {
    echo "No items found";
}

// Close the connection
$conn->close();
?>
