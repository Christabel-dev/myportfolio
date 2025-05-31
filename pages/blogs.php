<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="/myporfolio/style/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Header Section -->
    <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="./home.html">
            <h1><span>C</span>HRISTABEL <span>AFRIYIE</span></h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="harmburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="./home.php" data-after="Home">Home</a></li>
            <li><a href="./home.php#services" data-after="Service">Services</a></li>
            <li><a href="./home.php#projects" data-after="Projects">Projects</a></li>
            <li><a href="./home.php#about" data-after="About">About</a></li>
            <li><a href="./home.php#contact" data-after="Contact">Contact</a></li>  
            <li><a href="./blogs.php">Blogs</a></li> 
            <li><a href="./gallery.php">Gallery</a></li>
            <li><a href="./login.php" >Log In</a></li>
                      
          </ul>
        </div>
      </div>
    </div>
  </section>
    <!-- End Header Section -->
<br><br>
    <!-- Blog Section -->
    <section id="blog">
        <div class="blog container">
            <div class="blog-top">
                <h1 class="section-title">My <span>Blog</span></h1>
                <p>Stay updated with my latest articles and news</p>
            </div>
            
            <!-- Category Filters -->
            <div class="blog-filters">
                <button class="filter-btn active" data-filter="all">All Posts</button>
                <button class="filter-btn" data-filter="news">News</button>
                <button class="filter-btn" data-filter="other">Other</button>
            </div>
            
            <!-- Blog Posts Grid -->
            <div class="blog-container">
                <!-- News Category Post 1 -->
                <div class="blog-item" data-category="news">
                    <div class="blog-img">
                        <img src="/myporfolio/images/chris1.jpg" alt="News Image">
                        <div class="blog-date">June 15, 2023</div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-category news">News</div>
                        <h3 class="blog-title">Latest Industry Developments</h3>
                        <p class="blog-excerpt">Stay informed about the newest trends and changes in our industry that could affect your business...</p>
                        <a href="#" class="blog-read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Other Category Post 1 -->
                <div class="blog-item" data-category="other">
                    <div class="blog-img">
                        <img src="/myporfolio/images/chris2.jpg" alt="Tech Image">
                        <div class="blog-date">June 10, 2023</div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-category other">Technology</div>
                        <h3 class="blog-title">Emerging Tech Trends</h3>
                        <p class="blog-excerpt">Explore the cutting-edge technologies that are shaping our future and how they might impact your daily life...</p>
                        <a href="#" class="blog-read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- News Category Post 2 -->
                <div class="blog-item" data-category="news">
                    <div class="blog-img">
                        <img src="/myporfolio/images/chris3.jpg" alt="Business Image">
                        <div class="blog-date">June 5, 2023</div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-category news">News</div>
                        <h3 class="blog-title">Company Announcements</h3>
                        <p class="blog-excerpt">Important updates from our company including new partnerships, product launches, and more...</p>
                        <a href="#" class="blog-read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Other Category Post 2 -->
                <div class="blog-item" data-category="other">
                    <div class="blog-img">
                        <img src="/myporfolio/images/chris4.jpg" alt="Tips Image">
                        <div class="blog-date">May 28, 2023</div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-category other">Tips</div>
                        <h3 class="blog-title">Productivity Hacks</h3>
                        <p class="blog-excerpt">Discover simple yet effective techniques to boost your productivity and get more done in less time...</p>
                        <a href="#" class="blog-read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- News Category Post 3 -->
                <div class="blog-item" data-category="news">
                    <div class="blog-img">
                        <img src="/myporfolio/images/chris5.jpg" alt="Event Image">
                        <div class="blog-date">May 20, 2023</div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-category news">News</div>
                        <h3 class="blog-title">Upcoming Events</h3>
                        <p class="blog-excerpt">Mark your calendars for these exciting events happening in our community and industry...</p>
                        <a href="#" class="blog-read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Other Category Post 3 -->
                <div class="blog-item" data-category="other">
                    <div class="blog-img">
                        <img src="/myporfolio/images/chris6.jpg" alt="Ideas Image">
                        <div class="blog-date">May 15, 2023</div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-category other">Ideas</div>
                        <h3 class="blog-title">Creative Thinking Techniques</h3>
                        <p class="blog-excerpt">Learn how to unlock your creative potential with these proven brainstorming methods...</p>
                        <a href="#" class="blog-read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            
            <!-- Pagination -->
            <div class="blog-pagination">
                <a href="#" class="pagination-btn active">1</a>
                <a href="#" class="pagination-btn">2</a>
                <a href="#" class="pagination-btn">3</a>
                <a href="#" class="pagination-btn next">Next <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </section>
    <!-- End Blog Section -->



    <!-- Footer -->
    <section id="footer">
        <div class="footer container">
            <div class="brand">
                <h1>My<span>Blog</span></h1>
            </div>
            <h2>Your Complete Blog Solution</h2>
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
            <p>Copyright © 2023 MyBlog. All rights reserved</p>
        </div>
    </section>
    <!-- End Footer -->

    <script>
        // Mobile menu toggle
        const hamburger = document.querySelector('.hamburger');
        const navList = document.querySelector('.nav-list ul');
        
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            navList.classList.toggle('active');
        });
        
        // Close mobile menu when clicking a link
        document.querySelectorAll('.nav-list ul li a').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navList.classList.remove('active');
            });
        });
        
        // Blog category filtering
        const filterButtons = document.querySelectorAll('.filter-btn');
        const blogItems = document.querySelectorAll('.blog-item');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Update active button
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                
                const filter = button.dataset.filter;
                
                // Filter blog items
                blogItems.forEach(item => {
                    if (filter === 'all' || item.dataset.category === filter) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>