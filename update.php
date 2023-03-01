<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "my_database");

// Check for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the data from the form
$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];

// Generate a QR code for the data
$qr_data = "Nombre: $name /\nDescripcion: $description /";
$qr_code = 'https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=' . urlencode($qr_data);

// Update the data and the QR code in the database
$sql = "UPDATE items SET name='$name', description='$description', qr_code='$qr_code' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Item updated successfully";
} else {
    echo "Error updating item: " . $conn->error;
}

