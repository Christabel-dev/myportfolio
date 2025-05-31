<?php
session_start();

// Database configuration
$host = 'localhost'; // or your host
$dbname = 'admin';
$username = 'root'; // your database username
$password = ''; // your database password

try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Prepare SQL statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            // Verify password with SHA-256
            $hashed_input = hash('sha256', $password);
            
            if ($hashed_input === $user['password']) {
                // Login successful - set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_name'] = $user['name'];
                
                // Redirect to dashboard
                header("Location: ./dashboard.php");
                exit();
            } else {
                // Invalid password
                $_SESSION['login_error'] = "Invalid email or password";
                header("Location: ./login.php");
                exit();
            }
        } else {
            // User not found
            $_SESSION['login_error'] = "Invalid email or password";
            header("Location: ./login.php");
            exit();
        }
    }
} catch(PDOException $e) {
    $_SESSION['login_error'] = "Database error: " . $e->getMessage();
    header("Location: ./login.php");
    exit();
}
?>