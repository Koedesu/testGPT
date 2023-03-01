<?php
// Step 1: Establish a connection to the database
$conn = mysqli_connect("localhost", "root", "", "my_database");

// Step 2: Check if an id parameter has been passed
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Step 3: Sanitize and validate the id parameter
    if (filter_var($id, FILTER_VALIDATE_INT)) {

        // Step 4: Execute a DELETE SQL query
        $sql = "DELETE FROM items WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Step 5: Redirect back to the main page
            header("Location: index.php");
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid id parameter";
    }
}
?>
