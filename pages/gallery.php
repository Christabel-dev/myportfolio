<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/myporfolio/style/home.css">
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
  <!-- End Header -->
   <br><br>
<section id="gallery">
    <div class="gallery">
        <h1 class="section-title">Our <span>Gallery</span></h1>
        
        <div class="gallery-filters">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="nature">Nature</button>
            <button class="filter-btn" data-filter="urban">Urban</button>
            <button class="filter-btn" data-filter="portraits">Portraits</button>
            <button class="filter-btn" data-filter="events">Events</button>
        </div>
        
        <div class="gallery-container">
            <!-- Gallery Item 1 -->
            <div class="gallery-item" data-category="nature">
                <img src="/myporfolio/images/chris1.jpg" alt="Nature" class="gallery-img">
                <div class="gallery-caption">
                    <h3>Mountain Sunrise</h3>
                    <p>Beautiful morning in the Rockies</p>
                </div>
            </div>
            
            <!-- Gallery Item 2 -->
            <div class="gallery-item" data-category="urban">
                <img src="/myporfolio/images/chris3.jpg" alt="Cityscape" class="gallery-img">
                <div class="gallery-caption">
                    <h3>City Lights</h3>
                    <p>Downtown at night</p>
                </div>
            </div>
            
            <!-- Gallery Item 3 -->
            <div class="gallery-item" data-category="portraits">
                <img src="/myporfolio/images/chris6.jpg" alt="Portrait" class="gallery-img">
                <div class="gallery-caption">
                    <h3>Portrait Session</h3>
                    <p>Studio photography</p>
                </div>
            </div>
            
            <!-- Add more gallery items as needed -->
        </div>
    </div>
    
    <!-- Lightbox Modal -->
    <div class="lightbox">
        <span class="close-lightbox">&times;</span>
        <div class="lightbox-content">
            <img src="" alt="" class="lightbox-img">
            <div class="lightbox-caption"></div>
        </div>
        <span class="lightbox-nav lightbox-prev">&#10094;</span>
        <span class="lightbox-nav lightbox-next">&#10095;</span>
    </div>
</section>
</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Update active button
            filterBtns.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            const filter = this.getAttribute('data-filter');
            
            // Filter items
            galleryItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
    
    // Lightbox functionality
    const lightbox = document.querySelector('.lightbox');
    const lightboxImg = document.querySelector('.lightbox-img');
    const lightboxCaption = document.querySelector('.lightbox-caption');
    const closeLightbox = document.querySelector('.close-lightbox');
    const galleryImages = document.querySelectorAll('.gallery-img');
    let currentIndex = 0;
    
    // Open lightbox
    galleryImages.forEach((img, index) => {
        img.addEventListener('click', function() {
            currentIndex = index;
            updateLightbox();
            lightbox.classList.add('active');
        });
    });
    
    // Close lightbox
    closeLightbox.addEventListener('click', function() {
        lightbox.classList.remove('active');
    });
    
    // Navigation
    document.querySelector('.lightbox-prev').addEventListener('click', function() {
        currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
        updateLightbox();
    });
    
    document.querySelector('.lightbox-next').addEventListener('click', function() {
        currentIndex = (currentIndex + 1) % galleryImages.length;
        updateLightbox();
    });
    
    // Update lightbox content
    function updateLightbox() {
        const imgSrc = galleryImages[currentIndex].getAttribute('src');
        const imgAlt = galleryImages[currentIndex].getAttribute('alt');
        const caption = galleryImages[currentIndex].parentElement.querySelector('.gallery-caption h3').textContent;
        
        lightboxImg.setAttribute('src', imgSrc);
        lightboxImg.setAttribute('alt', imgAlt);
        lightboxCaption.textContent = caption;
    }
    
    // Close when clicking outside image
    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) {
            lightbox.classList.remove('active');
        }
    });
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (lightbox.classList.contains('active')) {
            if (e.key === 'Escape') {
                lightbox.classList.remove('active');
            } else if (e.key === 'ArrowLeft') {
                currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
                updateLightbox();
            } else if (e.key === 'ArrowRight') {
                currentIndex = (currentIndex + 1) % galleryImages.length;
                updateLightbox();
            }
        }
    });
});
</script>