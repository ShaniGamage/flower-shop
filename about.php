<?php
include 'connection.php';
session_start();

$user_id= $_SESSION['user_id'];
if(!isset($user_id)){
    header('location:login.php');
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
        <h1>about us</h1>
        <p>Lorem ipsum dolor sit amet consectuer adipising elit.</p>
    </div>

    <div class="about">
        <div class="row">
            <div class="detail">
                <h1>visit our beautiful showroom</h1>
                <p>Our showroom is an expression what we love doing. being creative with floral and plant arrangemnets. whether you looking for a florist for your perfect wedding or just want to bla bla blaa</p>
                <a href="shop.php" class="btn2">shop now</a>
            </div>
            <!--<div class="img-box">
                <img src="images/orchid.jpg">
            </div>-->
        </div>
    </div>
    <div class="banner-2">
        <h1>Let us Make your wedding flawless </h1>
        <a href="shop.php" class="btn2">shop now</a>
    </div>
    <div class="services">
        <h1 class="title">our services</h1>
        <div class="box-container">
            <div class="box">
                <i class="bi bi-percent"></i>
                <h3>30% OFF + FREE SHIPPING</h3>
                <p>starting at $36/mo, plus ,get $120 credit 1 year on regular orders</p>
            </div>
            <div class="box">
                <i class="bi bi-asterisk"></i>
                <h3>Freshest blooms</h3>
                <p>starting at $36/mo, plus ,get $120 credit 1 year on regular orders</p>
            </div>
            <div class="box">
                <i class="bi bi-alarm"></i>
                <h3>super flexible</h3>
                <p>starting at $36/mo, plus ,get $120 credit 1 year on regular orders</p>
            </div>
        </div>
    </div>

    <div class="stylist">
        <h1 class="title">Florial stylist</h1>
        <p>Meet the Team that makes miracles happen </p>
        <div class="box-container">
            <div class="box">
                <div class="img-box">
                    <img src="images/orchid.jpg">
                    <div class="social-links">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-youtube"></i>
                        <i class="bi bi-whatsapp"></i>
                        <i class="bi bi-tiktok"></i>
                    </div>
                </div>
                <h3>sara smith</h3>
                <p>developer</p>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="images/orchid.jpg">
                    <div class="social-links">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-youtube"></i>
                        <i class="bi bi-whatsapp"></i>
                        <i class="bi bi-tiktok"></i>
                    </div>
                </div>
                <h3>sara smith</h3>
                <p>developer</p>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="images/orchid.jpg">
                    <div class="social-links">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-youtube"></i>
                        <i class="bi bi-whatsapp"></i>
                        <i class="bi bi-tiktok"></i>
                    </div>
                </div>
                <h3>sara smith</h3>
                <p>developer</p>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>