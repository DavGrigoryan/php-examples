<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "test_db";

try {
    // Create a PDO connection with a DSN string
    $dsn = "mysql:host=$servername;dbname=$database;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $conn = new PDO($dsn, $username, $password, $options);

    echo "Connected successfully<br>";

    // Example of fetching data
    $stmt = $conn->query("SELECT * FROM users");
    $users = $stmt->fetchAll();

    if ($users) {
        foreach ($users as $user) {
            echo htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . "<br>";
        }
    } else {
        echo "No users found.<br>";
    }

} catch (PDOException $e) {
    // Log the error for debugging purposes (in production, this could be logged to a file)
    error_log("Connection failed: " . $e->getMessage(), 0);

    // Display a generic message to the user
    echo "An error occurred while connecting to the database.";
} finally {
    // Close the connection
    $conn = null;
}