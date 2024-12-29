<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Database connection
    $host = 'localhost';
$port = '5432';
$dbname = 'register';
$user = 'postgres';
$password = '1234';
    
    $conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

    if (!$conn) {
        echo "An error occurred.\n";
        exit;
    }

    $query = "INSERT INTO feedback (name, email, phone, message) VALUES ($1, $2, $3, $4)";
    $result = pg_query_params($conn, $query, array($name, $email, $phone, $message));

    if ($result) {
        echo "success";
    } else {
        echo "An error occurred while saving your feedback.";
    }

    pg_close($conn);
}
?>
