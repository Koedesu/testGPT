<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "my_database");

// Check for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {


// Delete the item from the database
$sql = "DELETE FROM items WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Item deleted successfully";
} else {
    echo "Error deleting item: " . $conn->error;
}
}
// Close the connection
$conn->close();

?>

