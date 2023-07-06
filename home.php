<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>Home || <?php echo $company_name ?></title> 
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   

</head>
<body class='body bg-dark'>
<style>
.bg-dark {font-family: Ubuntu;
font-style: normal;
font-weight: 400;
background-color:#000000;;
size: 16px;
line-height: 24px;
}
.title{
   color:white;
}.titlee{
   color:white;
   font-size:30px;
   text-transform:uppercase;
 letter-spacing:5px;
 padding: 2px;
}</style>
  
<?php include 'header.php'; ?>

<section class="home">

   <div class="content">
      <h1 class='titlee'>Hand Picked PRODUCT to your door.</h1>
      <p>TEE shop provides you with sells of products or services to customers worldwide, offering convenience and accessibility. By operating online, we can reach a vast customer base without the limitations of a physical location. This allows us to tap into a global market, expanding your reach and potential sales.</p>
      <a href="about" class="white-btn">discover more</a>
   </div>

</section>

<section class="products">


   <h1 class="title">latest products</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="img image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop" class="option-btn">load more</a>
   </div>

</section>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/about-img.jpg" alt="">
      </div>

      <div class="content">
         <h3>about us</h3>
         <p>As the owner of an online store, we embarked on an exciting venture that can offer numerous opportunities for growth and success. >>>>>>>></p>
         <a href="about" class="btn">read more</a>
      </div>

   </div>

</section>

<section class="home-contact bg">

   <div class="content">
      <h3>have any questions?</h3>
      <p>ask us any questions and we will reply you within 24hrs</p>
      <a href="contact" class="white-btn">contact us</a>
   </div>

</section>
<!-- <style>
   
.home-contact{
    background-image: linear-gradient(to right, #314755 0%, #26a0da 51%, #314755 100%) !important;
}
.products{
         border: 2px double white;
         background-image: linear-gradient(to right, #314755 0%, #29a0da 51%, #314755 100%) !important;
           }
            .about{
         
         background-image: linear-gradient(to right, #314755 0%, #29a0da 51%, #314755 100%) !important;
           }
           .footer{
         
         background-image: linear-gradient(to right, #314755 0%, #29a0da 51%, #314755 100%) !important;
           }
</style> -->




<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>