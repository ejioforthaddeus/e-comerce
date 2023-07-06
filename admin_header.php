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
.bg-dark {font-family: Ubuntu;
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

   <div class="flex"> 
      <a  href="admin_page" class="logo"><span class='li'>Welcome</span><span >  <?php echo $_SESSION['admin_name']?> <span class='li'>!!</span> </span></a>

      <nav class="navbar">
         <a class='li' href="admin_page">home</a>
         <a class='li' href="admin_products">products</a>
         <a class='li' href="admin_orders">orders</a>
         <a class='li' href="admin_users">users</a>
         <a class='li' href="admin_contacts">messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="li fas fa-bars"></div>
         <div id="user-btn" class="li fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout" class="delete-btn">logout</a>
         <div>new <a href="login">login</a> | <a href="login">register</a></div>
      </div>

   </div>

</header>