<?php
session_start();

// Simulate database connection (you should replace this with your database connection logic)
$host = "localhost";
$username = "root";
$password = "";
$database = "name_storage";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate user credentials (replace this with your actual validation logic)
    $username = $_POST["fusername"];
    $password = $_POST["fpassword"];

    // Simulate a query to fetch user details based on username and password
    $query = "SELECT id, fname FROM registered_users WHERE fusername = '$username' AND fpassword = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Login successful
        $row = $result->fetch_assoc();
    $id = $row["id"];
    $fname = $row["fname"]; // Assuming the user's full name is stored in "fname" column in the database

    // Store user information in the session
    $_SESSION["id"] = $id;
    $_SESSION["fusername"] = $username;
    $_SESSION["fname"] = $fname;

        // Redirect to the main website page
        header("Location: index.php");
        exit();
    } else {
        // Redirect to login/signup on failed login
        header("Location: fail_login.html");
        exit();
    }
}

// Close the database connection
$conn->close();
?>
