<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
  <style>
header{font-family: Ubuntu;
font-style: normal;
font-weight: 400;
background-color:#000000;;
size: 16px;
line-height: 24px;
}
.li{
   color:white !important;
}

@media (max-width:800px) {
   .navbar a{
      
background-color:#000000;;
   }
   
}
</style>
<header class="header bg-dark">

   <div class="header-1 bg-dark">
      <div class="flex bg-dark">
         <div class="share">
            <a  href="#" class="li fab fa-facebook-f"></a>
            <a  href="#" class="li fab fa-twitter"></a>
            <a  href="#" class="li fab fa-instagram"></a>
            <a  href="#" class="li fab fa-linkedin"></a>
         </div>
         <p class='li'> new <a href="login">login</a> | <a href="login">register</a> </p>
      </div>
   </div>

   <div class="header-2 bg-dark">
      <div class="flex  bg-dark">
         <a href="home" class="logo"><img src="images/logo.png" width='70' alt="teecodes"></a>

         <nav class="navbar">
            <a class='li' href="home">home</a>
            <a class='li' href="about">about</a>
            <a class='li' href="shop">shop</a>
            <a class='li' href="contact">contact</a>
            <a class='li' href="orders">orders</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="li fas fa-bars"></div>
            <a  href="search_page" class="li fas fa-search"></a>
            <div id="user-btn" class="li fas fa-user"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart"> <i class="li fas fa-shopping-cart"></i> <span class='li'>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>

         <div class="user-box">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout" class="delete-btn">logout</a>
         </div>
      </div>
   </div>
 
</header>
