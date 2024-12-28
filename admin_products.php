<?php
include 'connection.php';
session_start();

$admin_id= $_SESSION['admin_id'];
if(!isset($admin_id)){
    header('location:login.php');
}

if(isset($_POST['logout'])){
    session_destroy();
    header('location:login.php');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Products</title>
</head>
<body>
    <?php include 'admin_header.php'?>
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
     <section class="add-product">
        <form method="post" action="" enctype="multipart/form-data">
            <h1 class="title">add new product</h1>
            <div class="input-field">
                <label>product name</label>
                <input type="text" name="name" required>
            </div>
            <div class="input-field">
                <label>product price</label>
                <input type="text" name="price" required>
            </div>
            <div class="input-field">
                <label>product details</label>
                <textarea name="product_detail" required></textarea>
            </div>
            <div class="input-field">
                <label>image</label>
                <input type="file" name="image" accept="image/jpg, image/png, image/jpeg" required>
            </div>
            <input type="submit" name="add_product" value="add product" class="btn">
        </form>
     </section>


    <script src="./js/script.js"></script>
</body>
</html>