<?php
// Database configuration
$host = 'localhost';
$dbname = 'admin';
$username = 'root';
$password = '';

/**
 * Get all users from database (only full_name and email)
 */
function getUsers() {
    global $host, $dbname, $username, $password;
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("SELECT * FROM projects");
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        error_log("Database error in getUsers(): " . $e->getMessage());
        return [];
    }
}

/**
 * Display users in a simple HTML table
 */
function displayProjectTable() {
    $users = getUsers();
    
    if (empty($users)) {
        echo '<div class="no-users">No users found in database.</div>';
        return;
    }
    
    echo '<table class="simple-users-table">';
    echo '<thead><tr><th>ID</th><th>Full Name</th><th>Email</th></tr></thead>';
    echo '<tbody>';
    
    foreach ($users as $user) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($user['id']) . '</td>';
        echo '<td>' . htmlspecialchars($user['title']) . '</td>';
        echo '<td>' . htmlspecialchars($user['description']) . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody></table>';
}



?>