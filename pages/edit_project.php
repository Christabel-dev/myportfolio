<?php
// Database configuration
$host = 'localhost';
$dbname = 'admin';
$username = 'root';
$password = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        deleteProject($_POST['id']);
    } elseif (isset($_POST['update'])) {
        updateProject($_POST['id'], $_POST['title'], $_POST['description'], $_FILES['image']);
    }
}

// Function to update a project
function updateProject($id, $title, $description, $image) {
    global $host, $dbname, $username, $password;
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Get current image path first
        $current = $conn->prepare("SELECT image_path FROM projects WHERE id = ?");
        $current->execute([$id]);
        $current_image = $current->fetchColumn();
        
        // Handle image upload
        $image_path = $current_image;
        if ($image['error'] === UPLOAD_ERR_OK) {
            $target_dir = "uploads/";
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            
            // Delete old image if exists
            if ($current_image && file_exists($current_image)) {
                unlink($current_image);
            }
            
            $file_extension = pathinfo($image['name'], PATHINFO_EXTENSION);
            $image_path = $target_dir . uniqid() . '.' . $file_extension;
            move_uploaded_file($image['tmp_name'], $image_path);
        }
        
        $stmt = $conn->prepare("UPDATE projects SET title = ?, description = ?, image_path = ? WHERE id = ?");
        $stmt->execute([$title, $description, $image_path, $id]);
        
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } catch(PDOException $e) {
        error_log("Database error in updateProject(): " . $e->getMessage());
        return false;
    }
}

// Function to delete a project
function deleteProject($id) {
    global $host, $dbname, $username, $password;
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // First get the image path to delete the file
        $stmt = $conn->prepare("SELECT image_path FROM projects WHERE id = ?");
        $stmt->execute([$id]);
        $image_path = $stmt->fetchColumn();
        
        if ($image_path && file_exists($image_path)) {
            unlink($image_path);
        }
        
        // Then delete the record
        $stmt = $conn->prepare("DELETE FROM projects WHERE id = ?");
        $stmt->execute([$id]);
        
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } catch(PDOException $e) {
        error_log("Database error in deleteProject(): " . $e->getMessage());
        return false;
    }
}

// Function to get all projects
function getProjects() {
    global $host, $dbname, $username, $password;
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("SELECT * FROM projects ORDER BY id DESC");
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        error_log("Database error in getProjects(): " . $e->getMessage());
        return [];
    }
}

// Function to get a single project by ID
function getProjectById($id) {
    global $host, $dbname, $username, $password;
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("SELECT * FROM projects WHERE id = ?");
        $stmt->execute([$id]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        error_log("Database error in getProjectById(): " . $e->getMessage());
        return null;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects Management</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
        img { max-width: 100px; max-height: 100px; display: block; }
        .form-container { margin: 30px 0; padding: 25px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; }
        input[type="text"], textarea { 
            width: 100%; 
            padding: 10px; 
            border: 1px solid #ddd; 
            border-radius: 4px; 
            box-sizing: border-box;
        }
        textarea { height: 120px; resize: vertical; }
        .btn { 
            padding: 10px 20px; 
            cursor: pointer; 
            border: none; 
            border-radius: 4px; 
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .btn-update { background-color: #4CAF50; color: white; }
        .btn-update:hover { background-color: #45a049; }
        .btn-delete { background-color: #f44336; color: white; }
        .btn-delete:hover { background-color: #d32f2f; }
        .btn-edit { 
            background-color: #2196F3; 
            color: white; 
            padding: 8px 15px; 
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-right: 10px;
        }
        .btn-edit:hover { background-color: #0b7dda; }
        .action-cell { white-space: nowrap; }
        .no-projects { padding: 20px; text-align: center; color: #666; }
        .current-image { margin-top: 10px; }
    </style>
</head>
<body>
    <h1>Projects Management (Edit Or Delete)</h1>

    <?php
    echo '<a href="./dashboard.php" class="btn-edit">Go to Dashboard</a>';
    // Display edit form if editing a project
    if (isset($_GET['edit'])) {
        $project = getProjectById($_GET['edit']);
        if ($project) {
            echo '<div class="form-container">';
            echo '<h2>Edit Project</h2>';
            echo '<form method="POST" enctype="multipart/form-data">';
            echo '<input type="hidden" name="id" value="'.htmlspecialchars($project['id']).'">';
            
            echo '<div class="form-group">';
            echo '<label for="title">Title:</label>';
            echo '<input type="text" id="title" name="title" value="'.htmlspecialchars($project['title']).'" required>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo '<label for="description">Description:</label>';
            echo '<textarea id="description" name="description" required>'.htmlspecialchars($project['description']).'</textarea>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo '<label for="image">Update Image (optional):</label>';
            echo '<input type="file" id="image" name="image">';
            if (!empty($project['image_path'])) {
                echo '<div class="current-image">';
                echo '<p>Current Image:</p>';
                echo '<img src="'.htmlspecialchars($project['image_path']).'">';
                echo '</div>';
            }
            echo '</div>';
            
            echo '<button type="submit" name="update" class="btn btn-update">Update Project</button>';
            echo '<a href="'.$_SERVER['PHP_SELF'].'" style="margin-left: 15px; color: #666; text-decoration: none;">Cancel</a>';
            echo '</form>';
            echo '</div>';
        } else {
            echo '<p style="color: red;">Project not found</p>';
        }
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th class="action-cell">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $projects = getProjects();
            if (empty($projects)) {
                echo '<tr><td colspan="5" class="no-projects">No projects found in database</td></tr>';
            } else {
                foreach ($projects as $project) {
                    echo '<tr>';
                    echo '<td>'.htmlspecialchars($project['id']).'</td>';
                    echo '<td>'.htmlspecialchars($project['title']).'</td>';
                    echo '<td>'.nl2br(htmlspecialchars($project['description'])).'</td>';
                    echo '<td>';
                    if (!empty($project['image_path'])) {
                        echo '<img src="'.htmlspecialchars($project['image_path']).'" alt="Project Image">';
                    } else {
                        echo 'No image';
                    }
                    echo '</td>';
                    echo '<td class="action-cell">';
                    echo '<a href="?edit='.$project['id'].'" class="btn-edit">Edit</a>';
                    echo '<form method="POST" style="display: inline-block;">';
                    echo '<input type="hidden" name="id" value="'.$project['id'].'">';
                    echo '<button type="submit" name="delete" class="btn btn-delete" onclick="return confirm(\'Are you sure you want to delete this project? This action cannot be undone.\')">Delete</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>