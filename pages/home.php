<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/myporfolio/style/home.css">
  <link rel="icon" href="/myporfolio/images/chris6.jpg">
  <title>My Portfolio</title>
</head>

<body>
  <!-- Header -->
  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="#home">
            <h1><span>C</span>HRISTABEL <span>AFRIYIE</span></h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="harmburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="#home" data-after="Home">Home</a></li>
            <li><a href="#services" data-after="Service">Services</a></li>
            <li><a href="#projects" data-after="Projects">Projects</a></li>
            <li><a href="#about" data-after="About">About</a></li>
            <li><a href="#contact" data-after="Contact">Contact</a></li>  
            <li><a href="./blogs.php">Blogs</a></li> 
            <li><a href="./gallery.php">Gallery</a></li>
            <li><a href="./login.php" >Log In</a></li>
                      
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->


  <!-- Hello Section  -->
  <section id="hello">
    <div class="hello container">
      <div>
        <h1>Hello, <span></span></h1>
        <h1>My Name is <span></span></h1>
        <h1>Afriyie Christabel</span></h1>
        <a href="#projects" type="button" class="cta">Portfolio</a>
      </div>
    </div>
  </section>
  <!-- End Hero Section  -->

  <!-- Service Section -->
  <section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">Serv<span>i</span>ces</h1>
        <p>Creating of test plans and test cases to ensure all functional requirements are covered during testing.
        </p>
      </div>
      <div class="service-bottom">
        <div class="service-item">
          <div class="icon">
            <img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2> Test Automation
          </h2>
          <p>Build robust automated test scripts using tools like Selenium or Cypress to increase test coverage and speed up development cycles.

          </p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2> Bug Reporting & Analysis
          </h2>
          <p>Provide clear and detailed bug reports using tools like Jira or Trello, making it easy for developers to fix issues fast.
          </p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>QA Process Optimization
          </h2>
          <p>Help teams set up efficient QA workflows, from test planning to release, making quality a consistent part of the development process.</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>Quality Testing Tools</h2>
          <p>I work with quality testing tools such as Appium, Atlassian, JIRA, Confluence, Chef, Puppet, OpenStack and Selenium.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- End Service Section -->

  <!-- Projects Section -->
  <!--section id="projects">
    <div class="projects container">
      <div class="projects-header">
        <h1 class="section-title">Recent <span>Projects</span></h1>
      </div>
      <div class="all-projects">
        <div class="project-item">
          <div class="project-info">
            <h1>Project 1</h1>
            <h2>Manual Testing</h2>
            <p>Performing thorough exploratory and test case-based testing to identify bugs and ensure product quality across various browsers and devices.
            </p>
          </div>
          <div class="project-img">
            <img src="/myporfolio/images/chris6.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project 2</h1>
            <h2>Test Automation</h2>
            <p>Building reliable automated test scripts using tools like Selenium, Cypress, or Playwright to increase test coverage and speed up release cycles
            </p>
          </div>
          <div class="project-img">
            <img src="/myporfolio/images/chris2.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project 3</h1>
            <h2>Bug reporting and Analysis</h2>
            <p>Document bugs clearly and concisely using tools like Jira or Trello, helping developers understand and resolve issues quickly.
            </p>
          </div>
          <div class="project-img">
            <img src="/myporfolio/images/chris3.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project 4</h1>
            <h2> Quality Process Consulting</h2>
        
            <p>Assist teams implement efficient QA processes—from test planning to release—ensuring high quality assurance standard</p>
          </div>
          <div class="project-img">
            <img src="/myporfolio/images/chris4.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project 5</h1>
            <h2>Quality Assurance Process</h2>
            <p>Participating in the overall quality assurance process for the mobile application, including regression testing and user acceptance testing.</p>
          </div>
          <div class="project-img">
            <img src="/myporfolio/images/chris5.jpg" alt="img">
          </div>
        </div>
      </div>
    </div>
  </section-->
    <!-- End Projects Section -->
<?php
// Database configuration (db_connection.php)
$host = 'localhost';
$dbname = 'admin';
$username = 'root';
$password = '';

try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Set default fetch mode to associative array
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

<section id="projects">
    <div class="projects container">
        <div class="projects-header">
            <h1 class="section-title">Recent <span>Projects</span></h1>
        </div>
        <div class="all-projects">
            <?php
            try {
                // Query to get all projects from database
                $stmt = $conn->query("SELECT * FROM projects ORDER BY created_at DESC");
                $projects = $stmt->fetchAll();
                
                if (count($projects) > 0) {
                    foreach ($projects as $project) {
                        ?>
                        <div class="project-item">
                            <div class="project-info">
                                <h1><?php echo htmlspecialchars($project['title']); ?></h1>
                                <h2><?php echo htmlspecialchars($project['technologies']); ?></h2>
                                <p><?php echo htmlspecialchars($project['description']); ?></p>
                            </div>
                            <div class="project-img">
                                <?php if (!empty($project['image_path'])): ?>
                                    <img src="<?php echo htmlspecialchars($project['image_path']); ?>" 
                                         alt="<?php echo htmlspecialchars($project['title']); ?>">
                                <?php else: ?>
                                    <img src="/myporfolio/images/chris1.jpg" alt="Default project image">
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p class="no-projects">No projects found. Please add some projects.</p>';
                }
            } catch(PDOException $e) {
                echo '<p class="error">Error loading projects: ' . htmlspecialchars($e->getMessage()) . '</p>';
            }
            ?>
        </div>
    </div>
</section>
  <!-- About Section -->
  <!--section id="about">
    <div class="about container">
      <div class="col-left">
        <div class="about-img">
          <img src="/myporfolio/images/chris2.jpg" alt="img">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title">About <span>me</span></h1>
        <h2>Quality Assurance Engineer</h2>
        <p> I ensure that softwares work seamlessly across devices and browsers.
          Moreover, I build robust automated test scripts using tools like Selenium or Cypress to increase test coverage and speed up development cycles.
          I provide clear and detailed bug reports using tools like Jira or Trello, making it easy for developers to fix issues fast.
         I assist teams to set up efficient QA workflows, from test planning to release, making quality a consistent part of the development process.
        </p>
        <a href="#" class="cta">Download Resume</a>
      </div>
    </div>
  </section-->
  <?php
// Database configuration
$host = 'localhost';
$dbname = 'admin';
$username = 'root';
$password = '';

/**
 * Get about me data from database
 */
function getAboutMeData() {
    global $host, $dbname, $username, $password;
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("SELECT * FROM about LIMIT 1"); // Assuming you only need one row
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC); // Using fetch() instead of fetchAll()
    } catch(PDOException $e) {
        error_log("Database error in getAboutMeData(): " . $e->getMessage());
        return null;
    }
}

// Get the data
$aboutData = getAboutMeData();
?>

<section id="about">
    <div class="about container">
        <div class="col-left">
            <div class="about-img">
                <!-- Assuming your database has an 'image_path' column -->
                <img src="/myporfolio/images/chris2.jpg" alt="About me image">
            </div>
        </div>
        <div class="col-right">
            <h1 class="section-title">About <span>me</span></h1>
            <!-- Assuming your database has 'job_title' and 'description' columns -->
            <h2><?php echo htmlspecialchars($aboutData['title']); ?></h2>
            <p><?php echo nl2br(htmlspecialchars($aboutData['content'] 
            )); ?></p>
            <!-- Example for resume link if you have it in database -->
            <?php if (!empty($aboutData['resume_link'])): ?>
                <a href="<?php echo htmlspecialchars($aboutData['resume_link']); ?>" class="cta">Download Resume</a>
            <?php endif; ?>
        </div>
    </div>
</section>
  <!-- End About Section -->

  <!-- Contact Section -->
  <section id="contact">
    <div class="contact container">
      <div>
        <h1 class="section-title">Contact <span>info</span></h1>
      </div>
      <div class="contact-items">
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" /></div>
          <div class="contact-info">
            <h1>Phone</h1>
            <h2>+233 241 277 639</h2>
            <h2>+233 202 936 542</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" /></div>
          <div class="contact-info">
            <h1>Email</h1>
            <h2>christabelafriyie300@gmail.com</h2>
            <h2>christabelafriyie992@gmail.com</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" /></div>
          <div class="contact-info">
            <h1>Address</h1>
            <h2>GIMPA, Achimota, Accra</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact Section -->

  <!-- Footer -->
  <section id="footer">
    <div class="footer container">
      <div class="brand">
        <h1><span>Christabel</span>Afriyie <span></span></h1>
      </div>
      <h2>Your Complete Web Solution</h2>
      <div class="social-icon">
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/instagram-new.png" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/twitter.png" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/behance.png" /></a>
        </div>
      </div>
      <p>Copyright © 2025 Arfan. All rights reserved</p>
    </div>
  </section>
  <!-- End Footer -->
  <script src="./app.js"></script>
</body>

</html>
