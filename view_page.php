<?php
include 'connection.php';
session_start();

$user_id= $_SESSION['user_id'];
if(!isset($user_id)){
    header('location:login.php');
}

/*----------------adding products to wishlist------------- */
if(isset($_POST['add_to_wishlist'])){
    $product_id=$_POST['product_id'];
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
    $product_image=$_POST['product_image'];

    $wishlist_number=mysqli_query($conn,"SELECT * FROM `wishlist` WHERE name='$product_name' AND user_id='$user_id' ") or die('query failed');
    $cart_number = mysqli_query($conn,"SELECT * FROM `cart` WHERE name='$product_name' AND user_id='$user_id' ") or die('query failed');
    if(mysqli_num_rows($wishlist_number)>0){
        $message[]='product already exists in wishlist';
    }else if(mysqli_num_rows($cart_number)){
        $message[]='product already exists in cart';
    }else{
        mysqli_query($conn,"INSERT INTO `wishlist` (`user_id`,`pid`,`name`,`price`,`image`) VALUES ('$user_id','$product_id','$product_name','$product_price','$product_image')");
        $message[]='product successfully added to the wishlist';
    }
}


/*----------------adding products to cart------------- */
if(isset($_POST['add_to_cart'])){
    $product_id=$_POST['product_id'];
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
    $product_image=$_POST['product_image'];

    $cart_number = mysqli_query($conn,"SELECT * FROM `cart` WHERE name='$product_name' AND user_id='$user_id' ") or die('query failed');
    if(mysqli_num_rows($cart_number)){
        $message[]='product already exists in cart';
    }else{
        mysqli_query($conn,"INSERT INTO `cart` (`user_id`,`pid`,`name`,`price`,`image`) VALUES ('$user_id','$product_id','$product_name','$product_price','$product_image')");
        $message[]='product successfully added to the cart';
    }
}

?>


<style type="text/css">
    <?php include 'main.css'?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <title>Petals</title>
</head>
<body>
    <?php include 'header.php' ?>
    <div class="banner">
        <h1>product detail</h1>
        <p>Lorem ipsum dolor sit amet consectuer adipising elit.</p>
    </div>
    <?php
        if(isset($message)){
            foreach($message as $message){
                echo "
                <div class='message'>
                <span>'.$message'</span>
                <i class='bi bi-x-circle' onclick='this.parentElement.remove()'></i>
                </div>";
            }
        }
    ?>
        
    <div class="view_page">
        <?php
        if(isset($_GET['pid'])){
            $pid=$_GET['pid'];
            $select_products = mysqli_query($conn,"SELECT * FROM `products` WHERE product_id='$pid'") or die('query failed');
            if(mysqli_num_rows($select_products)>0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){

        ?>
        <form method="post" action="" class="box">
            <img src="images/<?php echo $fetch_products['image']?>">
            <div class="detail">
                <div class="price">$<?php echo $fetch_products['price']?>/=</div>
                <div class="name"><?php echo $fetch_products['name']?></div>
                <div class="detail"><?php echo $fetch_products['product_detail']?></div>
                <input type="hidden" name="product_id" value="<?php echo $fetch_products['product_id']?>">
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']?>">

                <div class="icon">
                    <button type="submit" name="add_to_wishlist" class="bi bi-heart"></button>
                    <input type="number" name="product_quantity" value="1" min="0" class="quantity">
                    <button type="submit" name="add_to_cart" class="bi bi-cart"></button>
                </div>
            </div>
        </form>
        <?php
                }
            }
        }
           
        ?>
        
    </div>
    <?php include 'footer.php' ?>
</body>
</html>