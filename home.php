<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beginscherm</title>
    <link rel="shortcut icon" href="images/8twitter.png" type="image/x-icon">
    <link 
    rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" 
    />
    <link 
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" 
    rel="stylesheet"
    />
    <link rel="stylesheet" href="main.css">
</head>
<body>

    <!--Main-page-->
<section class="main-page">

<!--Left side-->
<div class="left">
 <div class="left-content">
  <div>
    <i class="fas fa-search"></i>
    <h3 class="left-content-heading">Find your Interests</h3>
  </div>
  <div>
    <i class="fas fa-user-friends"></i>
    <h3 class="left-content-heading">
        Explore what people are talking about
    </h3>
  </div> 
  <div>
    <i class="fas fa-comment"></i>
    <h3 class="left-content-heading">Join the people</h3>
  </div>
</div>
</div>
  <!--End of Left-->

  <!--Right side-->
<div class="right">
 <div class="right-content">
    <form class="right-content-form" action="index_post.php" method="post">
        <input type="text" class="user-info" placeholder="Username"/>
        <div>
            <input type="password" class="password" placeholder="Password">
            
        </div>
        <button type="submit" class="btn-top">Log In
          <a href="index_post.php"></a>
        </button>
        
    </form>
    <div class="middle-content">
        <i class="fas fa-dove"></i>
        <h1>Explore what's happening in the world!</h1>
        <h4>Join Chirpify today</h4>
            <a href="signup_page.php" class="active">
        <button class="sign-up main-btn" method="post">Sign-Up</a></button>
       
    </div>
 </div>
 </div>

 <!--Footer-->
 <footer class="main-page-footer">
<ul>
<li><a href="about.html">About</a></li>
<li><a href="contact.html">Contact</a></li>
<li><a href="#">&copy; 2023 Chirpify</a></li>
</ul>
 </footer>
</section>

<script src="script.js"></script>
</body>
</html>
