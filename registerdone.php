<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['register_click'])) {
   
    $femail = $_POST['femail'];
    $faddress = $_POST['faddress'];
    $fpincode = $_POST['fpincode'];
    $fusername = $_POST['fusername'];
    $fpassword = $_POST['fpassword'];
    $fphone = $_POST['fphone'];

    // Format the date (assuming $fdob is in a different format)
    $formatted_dob = date('Y-m-d', strtotime($fdob));

    // Database connection configuration
    $db_host = "localhost"; // Your MySQL host
    $db_username = "root"; // Your MySQL username
    $db_password = ""; // Your MySQL password
    $db_name = "name_storage"; // Your MySQL database name

    // Establish a database connection
    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO registered_users ( femail, faddress,  fpincode,  fusername, fpassword, fphone) VALUES (?, ?, ?, ?, ?, ?)");

    // Bind parameters with appropriate data types and order
    $stmt->bind_param("ssissi", $femail, $faddress,  $fpincode,  $fusername, $fpassword, $fphone);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: logindone.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
}
?>
