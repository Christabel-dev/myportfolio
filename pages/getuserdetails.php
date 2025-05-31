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
        
        $stmt = $conn->prepare("SELECT * FROM users");
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
function displayUsersTable() {
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
        echo '<td>' . htmlspecialchars($user['name']) . '</td>';
        echo '<td>' . htmlspecialchars($user['email']) . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody></table>';
}

function getProjects() {
    global $host, $dbname, $username, $password;
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("SELECT * FROM projects");
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        error_log("Database error in getProjects(): " . $e->getMessage());
        return [];
    }
}

function displayProjectTable() {
    $projects = getProjects();
    
    if (empty($projects)) {
        echo '<div class="no-projects">No projects found in database.</div>';
        return;
    }
    
    echo '<table class="projects-table">';
    echo '<thead><tr><th>ID</th><th>Title</th><th>Description</th><th>Image</th><th>Actions</th></tr></thead>';
    echo '<tbody>';
    
    foreach ($projects as $project) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($project['id']) . '</td>';
        echo '<td>' . htmlspecialchars($project['title']) . '</td>';
        echo '<td>' . htmlspecialchars($project['description']) . '</td>';
        echo '<td>';
        if (!empty($project['image_path'])) {
            echo '<img src="' . htmlspecialchars($project['image_path']) . '" alt="Project Image" style="max-width: 100px;">';
        } else {
            echo 'No image';
        }
        echo '</td>';
        echo '<td>';
        echo '<a href="edit_project.php?id=' . $project['id'] . '" class="btn btn-update">Edit</a>';
        echo '<a href="edit_project.php?id=' . $project['id'] . '" style="margin-left: 15px; color: #666; text-decoration: none; onclick="return confirm(\'Are you sure you want to delete this project?\')">Delete</a>';
        echo '</td>';
        echo '</tr>';
    }
    
    echo '</tbody></table>';
}


?>

