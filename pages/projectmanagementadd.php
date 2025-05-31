<?php
// Database configuration
$host = 'localhost'; // or your server address
$dbname = 'admin';
$username = 'root';
$password = '';

try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // echo "Connected successfully"; // Uncomment for testing
    
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO projects 
                               (title, description, technologies, image_path, created_at) 
                               VALUES (:title, :description, :technologies, :image_path, NOW())");
        
        // Handle file upload
        $imagePath = '';
        if (isset($_FILES['project_image']) && $_FILES['project_image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../images/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            
            $fileName = uniqid() . '_' . basename($_FILES['project_image']['name']);
            $targetPath = $uploadDir . $fileName;
            
            if (move_uploaded_file($_FILES['project_image']['tmp_name'], $targetPath)) {
                $imagePath = $targetPath;
            }
        }
        
        // Bind parameters
        $stmt->bindParam(':title', $_POST['project_title']);
        $stmt->bindParam(':description', $_POST['project_description']);
        $stmt->bindParam(':technologies', $_POST['project_technologies']);
        $stmt->bindParam(':image_path', $imagePath);
        
        // Execute the statement
        $stmt->execute();
        
        // Redirect after successful submission
        header('Location: dashboard.php?status=success');
        exit();
        
    } catch(PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>