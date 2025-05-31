<?php
// Database configuration
$host = 'localhost';     // Your database host (usually 'localhost')
$dbname = 'your_database_name';  // Your database name
$username = 'your_username';     // Your database username
$password = 'your_password';     // Your database password

// Set DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

// PDO options
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Enable error reporting
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Set default fetch mode
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Disable prepared statement emulation
];

try {
    // Create PDO instance
    $pdo = new PDO($dsn, $username, $password, $options);
    
    // Optional: Test connection
    // $pdo->query("SELECT 1");
    
} catch (PDOException $e) {
    // Handle connection error
    error_log("Database connection failed: " . $e->getMessage());
    
    // Show user-friendly message (don't expose details in production)
    die("Could not connect to the database. Please try again later.");
}

// Function to safely execute queries (optional helper function)
function executeQuery($sql, $params = []) {
    global $pdo;
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    } catch (PDOException $e) {
        error_log("Query failed: " . $e->getMessage() . " [SQL: $sql]");
        throw $e;
    }
}
?>