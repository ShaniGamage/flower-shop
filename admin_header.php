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
            <a href="admin.php" class="logo">Admin <span>Pannel</span></a>

            <nav class="navbar">
                <a href="admin.php">Home</a>
                <a href="admin_products.php">Products</a>
                <a href="admin_orders.php">orders</a>
                <a href="admin_users.php">users</a>
            </nav>

            <div class="icons">
                <i class="bi bi-list-ul" id="menu-btn"></i>
                <i class="bi bi-person" id="user-btn"></i>
            </div>

            <div class="user-box">
                <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
                <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
                <form method="post" class="logout">
                    <button name="logout" class="logout-btn">LOGOUT</button>
                </form>
            </div>
        </div>
    </header>

    <script src="./js/script.js"></script>
    
</body>
</html>