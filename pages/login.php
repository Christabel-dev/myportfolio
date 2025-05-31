<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/myporfolio/style/home.css">
  <title>Login</title>
  <style>
    /* Add these styles to your existing home.css or include separately */
    
    .login-container {
        background-color: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0px 0px 18px 0 #0000002c;
        width: 100%;
        max-width: 450px;
        margin: 50px auto;
    }
    
    .login-title {
        font-size: 3rem;
        font-weight: 300;
        color: black;
        margin-bottom: 30px;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 0.2rem;
    }
    
    .login-title span {
        color: crimson;
    }
    
    .login-form .form-group {
        margin-bottom: 25px;
    }
    
    .login-form label {
        display: block;
        font-size: 1.4rem;
        margin-bottom: 8px;
        color: #333;
        letter-spacing: 0.05rem;
    }
    
    .login-form input {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1.4rem;
        font-family: 'Montserrat', sans-serif;
        transition: border 0.3s ease;
    }
    
    .login-form input:focus {
        border-color: crimson;
        outline: none;
    }
    
    .login-btn {
        display: inline-block;
        width: 100%;
        padding: 12px 30px;
        color: white;
        background-color: crimson;
        border: 2px solid crimson;
        font-size: 1.6rem;
        text-transform: uppercase;
        letter-spacing: 0.1rem;
        margin-top: 20px;
        transition: 0.3s ease;
        cursor: pointer;
        border-radius: 5px;
    }
    
    .login-btn:hover {
        background-color: #b01030;
        border-color: #b01030;
    }
    
    .login-links {
        margin-top: 20px;
        text-align: center;
    }
    
    .login-links a {
        color: crimson;
        font-size: 1.3rem;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .login-links a:hover {
        color: #b01030;
    }
    
    .error-message {
        color: crimson;
        font-size: 1.2rem;
        margin-top: 5px;
        display: none;
    }
    
    .success-message {
        color: #19C094;
        font-size: 1.2rem;
        margin-top: 5px;
        display: none;
    }
</style>
</head>

<body>
   <!-- Header -->
  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="./home.php">
            <h1><span>C</span>HRISTABEL <span>AFRIYIE</span></h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="harmburger">
            <div class="bar"></div>
          </div>          
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->
l
<div class="container">
    <div class="login-container">
        <h1 class="login-title">My <span>Portfolio</span></h1>
        
        <!-- Display error message if exists -->
        <?php if (isset($_SESSION['login_error'])): ?>
            <div class="error-message" style="display: block; text-align: center; margin-bottom: 20px; color: crimson; font-size: 1.4rem;">
                <?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?>
            </div>
        <?php endif; ?>
        
        <form action="./login_conn.php" method="POST" class="login-form">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>
            
            <button type="submit" class="login-btn">Login</button>
            
            <div class="login-links">
                <a href="forgot-password.php">Forgot password?</a> | <a href="register.php">Create account</a>
            </div>
        </form>
    </div>
</div>
</body>

</html>