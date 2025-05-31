<?php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['user_id'])) {  // Added missing parenthesis here
    // Redirect to login page
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Admin Dashboard</title>
    <link rel="stylesheet" href="/myporfolio/style/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    <div class="admin-container">
        <!-- Sidebar Navigation -->
        <aside class="admin-sidebar">
            <div class="sidebar-brand">
                <h1><i class="fas fa-blog"></i> Blog<span>Admin</span></h1>
            </div>
            
            <nav class="sidebar-nav">
            <ul>
                <li class="active"><a href="#dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="#users"><i class="fas fa-users"></i> Users</a></li>
                <li><a href="#posts"><i class="fas fa-newspaper"></i> Posts</a></li>
                <li><a href="#media"><i class="fas fa-images"></i> Media</a></li>
                <li><a href="#projects"><i class="fas fa-project-diagram"></i> Projects</a></li>
                <li><a href="#comments"><i class="fas fa-comments"></i> Comments</a></li>
                <li><a href="#about"><i class="fas fa-info-circle"></i> About Us</a></li>
                <li><a href="#settings"><i class="fas fa-cog"></i> Settings</a></li>
            </ul>
            </nav>
            
            <div class="sidebar-footer">
                <a  href="./logout.php"><button id="logout-btn" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button></a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="admin-main">
            <!-- Top Navigation -->
            <header class="admin-header">
                <div class="header-left">
                    <button class="toggle-sidebar">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h2 id="section-title">Dashboard</h2>
                </div>
                
                <div class="header-right">
                    <div class="notifications">
                        <i class="fas fa-bell"></i>
                        <span class="notification-count">3</span>
                    </div>
                    <div class="profile-dropdown">
                        <div class="profile-info">
                            <img src="/myporfolio/images/chris2.jpg" alt="Profile">
                            <span>Admin User</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="admin-content">
                <!-- Dashboard Section -->
                <section id="dashboard" class="content-section active-section">
                    <div class="content-header">
                        <h3>Quick Stats</h3>
                    </div>
                    
                    <div class="stats-cards">
                        <div class="stat-card">
                            <div class="stat-icon" style="background-color: #19C094;">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="stat-info">
                                <h4>Total Posts</h4>
                                <p>42</p>
                            </div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-icon" style="background-color: #FF6B6B;">
                                <i class="fas fa-comments"></i>
                            </div>
                            <div class="stat-info">
                                <h4>Comments</h4>
                                <p>128</p>
                            </div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-icon" style="background-color: #4ECDC4;">
                                <i class="fas fa-images"></i>
                            </div>
                            <div class="stat-info">
                                <h4>Media Files</h4>
                                <p>156</p>
                            </div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-icon" style="background-color: #FFA07A;">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div class="stat-info">
                                <h4>Views</h4>
                                <p>5,240</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="recent-activity">
                        <h4>Recent Activity</h4>
                        <div class="activity-list">
                            <div class="activity-item">
                                <div class="activity-icon">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div class="activity-content">
                                    <p>You published a new post "The Future of Web Development"</p>
                                    <span class="activity-time">2 hours ago</span>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon">
                                    <i class="fas fa-comment"></i>
                                </div>
                                <div class="activity-content">
                                    <p>John Doe commented on "Best Travel Destinations"</p>
                                    <span class="activity-time">5 hours ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Users Management Section -->
<section id="users" class="content-section">
     <!-- Display error message if exists -->
        <?php if (isset($_SESSION['login_error'])): ?>
            <div class="error-message" style="display: block; text-align: center; margin-bottom: 20px; color: crimson; font-size: 1.4rem;">
                <?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?>
            </div>
        <?php endif; ?>
    <div class="section-header">
        <h3>Manage Users</h3>
        <button class="btn-primary" id="add-user-btn">
            <i class="fas fa-plus"></i> Add New User
        </button>
    </div>
    
    <!-- User Editor -->
    <div class="user-editor" id="user-editor">
        <div class="editor-header">
            <h4>Create New User</h4>
            <button class="btn-close" id="close-user-editor">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="user-form" method="post" action="./user_management.php">
            <div class="form-group">
                <label for="user-name">Full Name</label>
                <input type="text" id="user-name" name="full_name" placeholder="Enter user's full name" required>
            </div>
            <div class="form-group">
                <label for="user-email">Email</label>
                <input type="email" id="user-email" name="email" placeholder="Enter user's email" required>
            </div>
            <div class="form-group">
                <label for="user-password">Password</label>
                <input type="password" id="user-password" name="password" placeholder="Create a password" required minlength="8">
                <small class="form-hint">Minimum 8 characters</small>
            </div>
            <!--div class="form-group">
                <label for="user-role">Role</label>
                <select id="user-role">
                    <option value="administrator">Administrator</option>
                    <option value="editor">Editor</option>
                    <option value="author">Author</option>
                    <option value="contributor">Contributor</option>
                    <option value="subscriber">Subscriber</option>
                </select>
            </div-->
            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i> Create User
                </button>
                <button type="button" class="btn-cancel" id="cancel-user-btn">
                    <i class="fas fa-times"></i> Cancel
                </button>
            </div>
        </form>
    </div>
    
    <!-- Users Table -->
    <div class="users-section">
    <h2>Registered Users</h2>
    <?php
    // Include your PHP file with the functions
    require_once './getuserdetails.php';
    
    // Display the users table
    displayUsersTable();
    ?>
</div>
</section>
                <!-- Posts Management Section -->
                <section id="posts" class="content-section">
                    <div class="section-header">
                        <h3>Manage Posts</h3>
                        <button class="btn-primary" id="add-post-btn">
                            <i class="fas fa-plus"></i> Add New Post
                        </button>
                    </div>
                    
                    <!-- Post Editor -->
                    <div class="post-editor" id="post-editor">
                        <div class="editor-header">
                            <h4>Create New Post</h4>
                            <button class="btn-close" id="close-editor">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <form id="post-form">
                            <div class="form-group">
                                <label for="post-title">Post Title</label>
                                <input type="text" id="post-title" placeholder="Enter post title" required>
                            </div>
                            <div class="form-group">
                                <label for="post-content">Content</label>
                                <textarea id="post-content" placeholder="Write your post content here..."></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="post-category">Category</label>
                                    <select id="post-category">
                                        <option value="technology">Technology</option>
                                        <option value="lifestyle">Lifestyle</option>
                                        <option value="travel">Travel</option>
                                        <option value="food">Food</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="post-tags">Tags</label>
                                    <input type="text" id="post-tags" placeholder="Add tags, separated by commas">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Featured Image</label>
                                <div class="image-upload">
                                    <input type="file" id="featured-image" accept="image/*" style="display: none;">
                                    <button type="button" class="btn-upload" id="upload-image-btn">
                                        <i class="fas fa-upload"></i> Upload Image
                                    </button>
                                    <div class="image-preview" id="image-preview"></div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn-primary">
                                    <i class="fas fa-save"></i> Publish Post
                                </button>
                                <button type="button" class="btn-secondary" id="save-draft-btn">
                                    <i class="fas fa-file-alt"></i> Save Draft
                                </button>
                                <button type="button" class="btn-cancel" id="cancel-post-btn">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Posts Table -->
                    <div class="posts-table">
                        <div class="table-actions">
                            <div class="search-box">
                                <i class="fas fa-search"></i>
                                <input type="text" placeholder="Search posts...">
                            </div>
                            <div class="table-filters">
                                <select>
                                    <option>All Statuses</option>
                                    <option>Published</option>
                                    <option>Draft</option>
                                </select>
                                <select>
                                    <option>All Categories</option>
                                    <option>Technology</option>
                                    <option>Travel</option>
                                </select>
                            </div>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Categories</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>The Future of Web Development</td>
                                    <td>Admin</td>
                                    <td>Technology</td>
                                    <td>2023-05-10</td>
                                    <td><span class="status published">Published</span></td>
                                    <td>
                                        <button class="btn-action edit"><i class="fas fa-edit"></i></button>
                                        <button class="btn-action delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>Best Travel Destinations 2023</td>
                                    <td>Admin</td>
                                    <td>Travel</td>
                                    <td>2023-05-08</td>
                                    <td><span class="status published">Published</span></td>
                                    <td>
                                        <button class="btn-action edit"><i class="fas fa-edit"></i></button>
                                        <button class="btn-action delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
                
                <!-- Media Library Section -->
                <section id="media" class="content-section">
                    <div class="section-header">
                        <h3>Media Library</h3>
                        <button class="btn-primary" id="upload-media-btn">
                            <i class="fas fa-upload"></i> Upload Media
                        </button>
                    </div>
                    
                    <div class="media-grid">
                        <div class="media-item">
                            <div class="media-thumbnail">
                                <img src="https://via.placeholder.com/300x200" alt="Media">
                                <div class="media-actions">
                                    <button class="btn-action edit"><i class="fas fa-edit"></i></button>
                                    <button class="btn-action delete"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                            <div class="media-info">
                                <h5>featured-image.jpg</h5>
                                <p>Uploaded: 2023-05-12</p>
                                <p>Size: 450 KB</p>
                            </div>
                        </div>
                    </div>
                </section>
<!-- Projects Management Section -->
<section id="projects" class="content-section">
    <div class="section-header">
        <h3>Manage Projects</h3>
        <button class="btn-primary" id="add-project-btn">
            <i class="fas fa-plus"></i> Add New Project
        </button>
    </div>
    
    <!-- Project Editor -->
    <div class="project-editor" id="project-editor">
        <div class="editor-header">
            <h4>Create New Project</h4>
            <button class="btn-close" id="close-project-editor">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="project-form" method="post" action="./projectmanagementadd.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="project-title">Project Title</label>
                <input type="text" id="project-title" name="project_title" placeholder="Enter project title" required>
            </div>
            <div class="form-group">
                <label for="project-description">Description</label>
                <textarea id="project-description" name="project_description" placeholder="Enter project description" required></textarea>
            </div>
            <div class="form-group">
                <label for="project-technologies">Technologies Used</label>
                <input type="text" id="project-technologies" name="project_technologies" placeholder="HTML, CSS, JavaScript, PHP, etc." required>
            </div>
            <div class="form-group">
                <label>Featured Image</label>
                <div class="image-upload">
                    <input type="file" id="project-image" name="project_image" accept="image/*" style="display: none;">
                    <button type="button" class="btn-upload" id="upload-project-image-btn">
                        <i class="fas fa-upload"></i> Upload Image
                    </button>
                    <div class="image-preview" id="project-image-preview"></div>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i> Save Project
                </button>
                <button type="button" class="btn-cancel" id="cancel-project-btn">
                    <i class="fas fa-times"></i> Cancel
                </button>
            </div>
        </form>
    </div>
    
       
       
            
    <!-- Project Table -->
    <div class="users-section">
    <h2>Projects</h2>
    <?php
    // Include your PHP file with the functions
    require_once './aboutusdetails.php';
    
    // Display the about us table
    displayProjectTable();
    ?>  
</div>
</section>
                
                <!-- Comments Section -->
                <section id="comments" class="content-section">
                    <div class="section-header">
                        <h3>Comments</h3>
                    </div>
                    
                    <div class="comments-list">
                        <div class="comment-item">
                            <div class="comment-avatar">
                                <img src="https://via.placeholder.com/50" alt="User">
                            </div>
                            <div class="comment-content">
                                <div class="comment-header">
                                    <h5>John Doe</h5>
                                    <span class="comment-date">2023-05-15</span>
                                    <span class="comment-status pending">Pending</span>
                                </div>
                                <p class="comment-text">Great article! Very informative and well-written.</p>
                                <div class="comment-actions">
                                    <button class="btn-action approve"><i class="fas fa-check"></i> Approve</button>
                                    <button class="btn-action reject"><i class="fas fa-times"></i> Reject</button>
                                    <button class="btn-action reply"><i class="fas fa-reply"></i> Reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- About Us Section -->
<section id="about" class="content-section">
    <div class="section-header">
        <h3>About Us Content</h3>
        <button class="btn-primary" id="edit-about-btn">
            <i class="fas fa-edit"></i> Add/Edit About Us
        </button>
    </div>
    
    <div class="about-content">
        <div class="about-editor" id="about-editor" style="display: none;">
            <form id="about-form" method="post" action="./aboutusconn.php">
    <div class="form-group">
        <label for="about-title">Title</label>
        <input type="text" id="about-title" name="about_title" placeholder="Enter page title" required>
    </div>
    <div class="form-group">
        <label for="about-content">Content</label>
        <textarea id="about-content-editor" name="about_content" placeholder="Write your about us content here..." required></textarea>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-save"></i> Save Changes
        </button>
        <button type="button" class="btn-cancel" id="cancel-about-btn">
            <i class="fas fa-times"></i> Cancel
        </button>
    </div>
</form>
        </div>
        
    </div>
     <!-- About Table -->
    <div class="users-section">
    <h2>About Us</h2>
    <?php
    // Include your PHP file with the functions
    require_once './aboutusdetails.php';
    
    // Display the about us table
    displayAboutTable();
    ?>
</div>
</section>
                <!-- Settings Section -->
                <section id="settings" class="content-section">
                    <div class="section-header">
                        <h3>Account Settings</h3>
                    </div>
                    
                    <div class="settings-tabs">
                        <div class="tab-buttons">
                            <button class="tab-btn active" data-tab="profile">Profile</button>
                            <button class="tab-btn" data-tab="password">Password</button>
                            <button class="tab-btn" data-tab="notifications">Notifications</button>
                        </div>
                        
                        <div class="tab-content active" id="profile-tab">
                            <form id="profile-form">
                                <div class="form-group">
                                    <label>Profile Picture</label>
                                    <div class="profile-picture-upload">
                                        <div class="profile-picture-preview">
                                            <img src="https://via.placeholder.com/150" alt="Profile">
                                        </div>
                                        <button type="button" class="btn-upload" id="upload-profile-btn">
                                            <i class="fas fa-upload"></i> Change Photo
                                        </button>
                                        <input type="file" id="profile-image" accept="image/*" style="display: none;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="profile-name">Full Name</label>
                                    <input type="text" id="profile-name" value="Admin User">
                                </div>
                                <div class="form-group">
                                    <label for="profile-email">Email</label>
                                    <input type="email" id="profile-email" value="admin@example.com">
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                        
                        <div class="tab-content" id="password-tab">
                            <form id="password-form">
                                <div class="form-group">
                                    <label for="current-password">Current Password</label>
                                    <input type="password" id="current-password" required>
                                </div>
                                <div class="form-group">
                                    <label for="new-password">New Password</label>
                                    <input type="password" id="new-password" required minlength="8">
                                    <small class="form-hint">Minimum 8 characters</small>
                                </div>
                                <div class="form-group">
                                    <label for="confirm-password">Confirm New Password</label>
                                    <input type="password" id="confirm-password" required>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn-primary">Change Password</button>
                                </div>
                                <div id="password-message" class="form-message"></div>
                            </form>
                        </div>
                        
                        <div class="tab-content" id="notifications-tab">
                            <div class="notification-settings">
                                <h4>Email Notifications</h4>
                                <div class="notification-item">
                                    <div class="notification-info">
                                        <h5>New comments</h5>
                                        <p>Get notified when someone comments on your posts</p>
                                    </div>
                                    <label class="switch">
                                        <input type="checkbox" checked>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                                <div class="notification-item">
                                    <div class="notification-info">
                                        <h5>Post approvals</h5>
                                        <p>Get notified when your posts are approved</p>
                                    </div>
                                    <label class="switch">
                                        <input type="checkbox" checked>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle sidebar
            const toggleBtn = document.querySelector('.toggle-sidebar');
            const sidebar = document.querySelector('.admin-sidebar');
            
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
            });
            // About Us Editor
            const aboutEditor = document.getElementById('about-editor');
            const aboutPreview = document.getElementById('about-preview');

            document.getElementById('edit-about-btn').addEventListener('click', () => {
                aboutEditor.style.display = 'block';
                aboutPreview.style.display = 'none';
            });

            document.getElementById('cancel-about-btn').addEventListener('click', () => {
                aboutEditor.style.display = 'none';
                aboutPreview.style.display = 'block';
            });

            // Section navigation
            const navLinks = document.querySelectorAll('.sidebar-nav a');
            const sections = document.querySelectorAll('.content-section');
            
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href').substring(1);
                    
                    // Update active nav item
                    navLinks.forEach(nav => nav.parentElement.classList.remove('active'));
                    this.parentElement.classList.add('active');
                    
                    // Update active section
                    sections.forEach(section => {
                        section.classList.remove('active-section');
                        if (section.id === targetId) {
                            section.classList.add('active-section');
                            document.getElementById('section-title').textContent = 
                                this.querySelector('i').nextSibling.textContent.trim();
                        }
                    });
                });
            });

            // Post editor toggle
            const postEditor = document.getElementById('post-editor');
            document.getElementById('add-post-btn').addEventListener('click', () => {
                postEditor.style.display = 'block';
            });
            
            document.getElementById('close-editor').addEventListener('click', () => {
                postEditor.style.display = 'none';
            });
            
            document.getElementById('cancel-post-btn').addEventListener('click', () => {
                postEditor.style.display = 'none';
            });

            // Image upload preview
            document.getElementById('upload-image-btn').addEventListener('click', () => {
                document.getElementById('featured-image').click();
            });
            
            document.getElementById('featured-image').addEventListener('change', function(e) {
                if (e.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        document.getElementById('image-preview').innerHTML = `
                            <img src="${event.target.result}" alt="Preview">
                        `;
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });

            // Profile image upload
            document.getElementById('upload-profile-btn').addEventListener('click', () => {
                document.getElementById('profile-image').click();
            });
            
            document.getElementById('profile-image').addEventListener('change', function(e) {
                if (e.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        document.querySelector('.profile-picture-preview img').src = event.target.result;
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });

            // Settings tabs
            const tabBtns = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const tabId = btn.getAttribute('data-tab');
                    
                    tabBtns.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    
                    tabContents.forEach(content => {
                        content.classList.remove('active');
                        if (content.id === `${tabId}-tab`) {
                            content.classList.add('active');
                        }
                    });
                });
            });

            // Change password form
            document.getElementById('password-form').addEventListener('submit', function(e) {
                e.preventDefault();
                const currentPass = document.getElementById('current-password').value;
                const newPass = document.getElementById('new-password').value;
                const confirmPass = document.getElementById('confirm-password').value;
                const messageEl = document.getElementById('password-message');

                if (newPass !== confirmPass) {
                    messageEl.textContent = "Passwords don't match!";
                    messageEl.className = 'form-message error';
                    return;
                }

               /* if (newPass.length < 8) {
                    messageEl.textContent = "Password must be at least 8 characters!";
                    messageEl.className = 'form-message error';
                    return;
                }*/

                // In real app, send to server here
                messageEl.textContent = "Password changed successfully!";
                messageEl.className = 'form-message success';
                this.reset();
                
                setTimeout(() => {
                    messageEl.style.display = 'none';
                }, 3000);
            });

            // Logout button
            document.getElementById('logout-btn').addEventListener('click', function() {
                if (confirm('Are you sure you want to logout?')) {
                    // In real app, call logout API then redirect
                    window.location.href = 'login.php';
                    
                }
            });
        });
        // Project editor toggle
const projectEditor = document.getElementById('project-editor');
document.getElementById('add-project-btn').addEventListener('click', () => {
    projectEditor.style.display = 'block';
});

document.getElementById('close-project-editor').addEventListener('click', () => {
    projectEditor.style.display = 'none';
});

document.getElementById('cancel-project-btn').addEventListener('click', () => {
    projectEditor.style.display = 'none';
});

// Project image upload preview
document.getElementById('upload-project-image-btn').addEventListener('click', () => {
    document.getElementById('project-image').click();
});

document.getElementById('project-image').addEventListener('change', function(e) {
    if (e.target.files[0]) {
        const reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('project-image-preview').innerHTML = `
                <img src="${event.target.result}" alt="Project Preview">
            `;
        };
        reader.readAsDataURL(e.target.files[0]);
    }
});
    </script>
</body>
</html>