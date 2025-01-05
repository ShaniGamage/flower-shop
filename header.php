<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="flex">
            <a href="admin.php" class="logo">petals</a>

            <nav class="navbar">
                <a href="index.php">Home</a>
                <a href="shop.php">shop</a>
                <a href="orders.php">orders</a>
                <a href="about.php">about us</a>
                <a href="contact.php">contact </a>
            </nav>

            <div class="icons">
                <i class="bi bi-list-ul" id="menu-btn"></i>
                <?php 
                $select_wishlist=mysqli_query($conn,"SELECT *FROM `wishlist` WHERE user_id='$user_id'") or die('query failed');
                $wishlist_num_rows= mysqli_num_rows($select_wishlist);
                ?>
                <a href="wishlist.php"><i class="bi bi-heart"></i><span>(<?php echo $wishlist_num_rows;?>)</span></a>
                
                <?php 
                $select_cart=mysqli_query($conn,"SELECT *FROM `cart` WHERE user_id='$user_id'") or die('query failed');
                $cart_num_rows= mysqli_num_rows($select_cart);
                ?>
                <a href="cart.php"><i class="bi bi-cart"></i><span>(<?php echo $cart_num_rows;?>)</span></a>
                
                <i class="bi bi-person" id="user-btn"></i>
            </div>

            <div class="user-box">
                <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
                <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
                <form method="post" class="logout">
                    <button name="logout" class="logout-btn">LOGOUT</button>
                </form>
            </div>
        </div>
    </header>

    <script src="./js/script.js"></script>
    <script>
    const closeBtn = document.querySelector('#close-edit');
    if (closeBtn) {
        closeBtn.addEventListener('click', function () {
            document.querySelector('.update-container').style.display = 'none';
        });
    }
</script>
</body>
</html>