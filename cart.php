<?php
include 'connection.php';
session_start();

$user_id= $_SESSION['user_id'];
if(!isset($user_id)){
    header('location:login.php');
}

/*----------------update products to cart------------- */
if(isset($_POST['update_quantity_btn'])){
    $update_quantity_id=$_POST['update_quantity_id'];
    $update_value=$_POST['update_quantity'];

    $update_query=mysqli_query($conn,"UPDATE `cart` SET quantity='$update_value' WHERE id='$update_quantity_id'") or die('query failed');

    if($update_query){
        header('location:cart.php');
    }
}

/*----------------adding products to cart------------- */


/*-------------------deleting products from cart --------------- */
if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];

    mysqli_query($conn,"DELETE FROM `cart` WHERE id='$delete_id'") or die('query failed');
    header('location:cart.php');
}

/*-------------------deleting products from cart --------------- */
if(isset($_GET['delete_all'])){
    mysqli_query($conn,"DELETE FROM `cart` WHERE user_id='$user_id'") or die('query failed');
    header('location:cart.php');
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
        <h1>my cart</h1>
        <p>Bringing You the Freshest Blooms, Where Every Bloom Tells a Story!</p>
    </div>
    <div class="shop">
        <h1 class="title">products added in cart</h1>
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
    <div class="box-container">
        <?php
        $grand_total=0;
        $select_cart = mysqli_query($conn,"SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed');
        if(mysqli_num_rows($select_cart)>0){
            while($fetch_cart= mysqli_fetch_assoc($select_cart)){

        ?>
        <div class="box">
            <div class="icon">
                <a href="cart.php?delete=<?php echo $fetch_cart['id']?>" class="bi bi-x"></a>
                <a href="view_page.php?pid=<?php echo $fetch_products['product_id']?>" class="bi bi-eye-fill"></a>
            </div>
            <img src="images/<?php echo $fetch_cart['image']?>">
            <div class="price">Rs.<?php echo $fetch_cart['price']?>/=</div>
            <div class="name"><?php echo $fetch_cart['name']?></div>
            <form method="post">
                <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']?>">
                <div class="qty">
                    <input type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart['quantity']?>">
                    <input type="submit" name="update_quantity_btn" value="update">
                </div>
                <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="btn2" onclick="return confirm('Do you want to delete this item from the cart?')">Delete</a>

            </form>
            <div class="total-amt">
                Total Amount : <span><?php echo $total_amt = ((float)$fetch_cart['price'] * (int)$fetch_cart['quantity']); ?></span>
            </div>
        </div>
        <?php
        $grand_total+=$total_amt;
            }
        }else{
            echo "no products in your cart";
        }
        ?>
        
    </div>

    <div class="dlt">
        <a href="cart.php?delete_all" class="btn2" onclick="return confirm('do you want ot delete all from cart ?')">delete all</a>
    </div>

    <div class="wishlist_total">
        <p>total amount payable : <span>$<?php echo $grand_total?>/=</span></p>
        <a href="shop.php" class="btn2"> continue shopping</a>
        <a href="checkout.php" class="btn2 <?php echo($grand_total > 1)?'':'disabled'?>" >proceed to check out</a>
    </div>
    
    </div>

    <?php include 'footer.php' ?>
</body>
</html>