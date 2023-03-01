<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "my_database");

// Check for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the data from the form
$name = $_POST['name'];
$description = $_POST['description'];

// Generate a QR code for the data
$qr_data = "Nombre: $name\nDescripcion: $description";
$qr_code = 'https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=' . urlencode($qr_data);

// Insert the data and the QR code into the database
$sql = "INSERT INTO items (name, description, qr_code) VALUES ('$name', '$description', '$qr_code')";
if ($conn->query($sql) === TRUE) {
    echo "Item created successfully";
} else {
    echo "Error creating item: " . $conn->error;
}

// Close the connection
$conn->close();
?>
