<?php
// Database configuration
$host = 'localhost';
$dbname = 'admin';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fullname = $_POST['full_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    // User data
    $name = $fullname;
    $email = $email;
    $plain_password = "$password";
    
    // Hash password with SHA-256
    $hashed_password = hash('sha256', $plain_password);

    // Check if email exists
        $check_stmt = $conn->prepare("SELECT id FROM users WHERE email = :email");
        $check_stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $check_stmt->execute();
        
        if ($check_stmt->rowCount() > 0) {
           
            echo '<script>alert("Email address is already registered");</script>';
            echo'<script>window.location.href = "dashboard.php"</script>';
            exit();
        }else{
    
    // Insert user
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->execute();
    
    echo '<script>alert("User created successfully!");</script>';
    echo'<script>window.location.href = "dashboard.php"</script>';
   // $_SESSION['login_error'] = "User created successfully!";
     //           header("Location: ./dashboard.php#users");
       //         exit();
}
}
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
