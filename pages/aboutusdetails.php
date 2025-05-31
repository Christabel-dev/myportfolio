<?php
function getAboutData() {
    global $host, $dbname, $username, $password;
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("SELECT * FROM about");
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        error_log("Database error in getAboutData(): " . $e->getMessage());
        return [];
    }
}

/**
 * Display about data in a simple HTML table
 */
function displayAboutTable() {
    $aboutData = getAboutData();
    
    if (empty($aboutData)) {
        echo '<div class="no-data">No data found in about table.</div>';
        return;
    }
    
    echo '<table class="about-table">';
    echo '<thead><tr>';
    
    // Dynamically create headers based on the keys of the first row
    if (empty($aboutData)) {
        echo '<div class="no-users">No users found in database.</div>';
        return;
    }
    
    echo '<table class="simple-users-table">';
    echo '<thead><tr><th>ID</th><th>Title</th><th>Content</th></tr></thead>';
    echo '<tbody>';
    
    foreach ($aboutData as $row) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['title']) . '</td>';
        echo '<td>' . htmlspecialchars($row['content']) . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody></table>';
    
}
?>