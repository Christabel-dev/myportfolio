<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a record already exists
$checkSql = "SELECT COUNT(*) as count FROM about";
$result = $conn->query($checkSql);
$row = $result->fetch_assoc();

$title = $_POST['about_title'];
$content = $_POST['about_content'];

if ($row['count'] > 0) {
    // Record exists - update it and inform user
    $stmt = $conn->prepare("UPDATE about SET title = ?, content = ? WHERE id = 1");
    $stmt->bind_param("ss", $title, $content);
    if($stmt->execute() == true){
        echo '<script>alert("Only one record is allowed in the database. Your changes have been updated in the existing record.");</script>';
        echo'<script>window.location.href = "dashboard.php"</script>';
    }
    if ($stmt->execute()) {
        echo '<script>alert("Only one record is allowed in the database. Your changes have been updated in the existing record.");</script>';
        echo '<script>window.location.href = "dashboard.php"</script>';
    } else {
        echo "Error updating record: " . $stmt->error;
    }
} else {
    // No record exists - insert new one
    $stmt = $conn->prepare("INSERT INTO about (id, title, content) VALUES (1, ?, ?)");
    $stmt->bind_param("ss", $title, $content);
    if($stmt->execute() == true){
        echo '<script>alert("New record created successfully. Note: Only one record is allowed in this database.");</script>';
        echo'<script>window.location.href = "dashboard.php"</script>';
    }
    if ($stmt->execute()) {
        echo '<script>alert("New record created successfully. Note: Only one record is allowed in this database.");</script>';
        echo '<script>window.location.href = "dashboard.php"</script>';
    } else {
        echo "Error: " . $stmt->error;
    }
}

$stmt->close();
$conn->close();

// Redirect back to the form or another page
header("Location: dashboard.php");

exit();
?>



