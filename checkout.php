<?php
include 'connection.php';
session_start();

$user_id= $_SESSION['user_id'];
if(!isset($user_id)){
    header('location:login.php');
}

/*-----------place order------------------ */
if(isset($_POST['order_btn'])){
    $name = mysqli_escape_string($conn,$_POST['name']);
    $number = mysqli_escape_string($conn,$_POST['number']);
    $email = mysqli_escape_string($conn,$_POST['email']);
    $method = mysqli_escape_string($conn,$_POST['method']);
    $address = mysqli_escape_string($conn,'flat no, '.$_POST['flat'].','.$_POST['street'].
              ','.$_POST['city'].','.$_POST['district']);

    $placed_on=date('d-M-Y');
    $cart_total=0;
    $cart_products[]='';
    $cart_query=mysqli_query($conn,"SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed');

    if(mysqli_num_rows($cart_query)>0){
        while($cart_item=mysqli_fetch_assoc($cart_query)){
            $cart_products[]=$cart_item['name'].'('.$cart_item['quantity'].' )';
            $sub_total=($cart_item['price']*$cart_item['quantity']);
            $cart_total +=$sub_total;
        }
    }
    $total_products=implode(', ',$cart_products);
    mysqli_query($conn,"INSERT INTO `orders`( `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`) 
                        VALUES ('$user_id','$name','$number','$email','$method','$address','$total_products','$cart_total','$placed_on')");

    mysqli_query($conn,"DELETE FROM `cart`  WHERE user_id='$user_id'");
    $message[]='order placed successfully';
    header('location:checkout.php');
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
        <h1>checkout page</h1>
        <p>Lorem ipsum dolor sit amet consectuer adipising elit.</p>
    </div>

    <div class="checkout-form">
        <h1 class="title">payment process</h1>
        <?php
    if (isset($message)) {
        foreach ($message as $msg) {
            echo '
            <div class="message">
                <span>' . htmlspecialchars($msg) . '</span>
                <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
            </div>';
        }
    }
    ?>
        <div class="display-order">
            <?php
            $select_cart=mysqli_query($conn,"SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed');
            $total=0;
            $grand_total=0;
            if(mysqli_num_rows($select_cart)>0){
                while($fetch_cart=mysqli_fetch_assoc($select_cart)){
                    $total_price=($fetch_cart['price']*$fetch_cart['quantity']);
                    $grand_total=$total+=$total_price;     
            ?>
            <span><?= $fetch_cart['name']?>(<?= $fetch_cart['quantity']?>)</span>
            <?php
                }
            }
            ?>
            <span class="grand_total">Total amount payable : Rs. <?php echo $grand_total?>/=</span>
        </div>
        <form method="post">
            <div class="input-field">
                <label>your name</label>
                <input type="text" name="name" placeholder="enter your name">
            </div>
            <div class="input-field">
                <label>your email</label>
                <input type="text" name="email" placeholder="enter your number">
            </div>
            <div class="input-field">
                <label>your number</label>
                <input type="text" name="number" placeholder="enter your email">
            </div>
            <div class="input-field">
                <label>select payment method</label>
                <select name="method">
                    <option selected disabled>select payment method</option>
                    <option class="cash on delivery">cash on delivery</option>
                    <option class="credit card">credit card</option>
                    <option class="koko">KOKO payments</option>
                    <option class="mintpay">mintpay</option>
                </select>
            </div>
            <div class="input-field">
                <label>address line 1:</label>
                <input type="text" name="flat" placeholder="e.g flat no.">
            </div>
            <div class="input-field">
                <label>address line 2:</label>
                <input type="text" name="street" placeholder="e.g street name">
            </div>
            <div class="input-field">
                <label>city :</label>
                <input type="text" name="city" placeholder="e.g Panadura">
            </div>
            <div class="input-field">
                <label>district :</label>
                <input type="text" name="district" placeholder="e.g Kalutara">
            </div>
            <input type="submit" name="order_btn" class="btn" value="order now">
        </form>
    </div>

    <?php include 'footer.php' ?>
</body>
</html>