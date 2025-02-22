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
    <div class="banner" style="background: url(./images/workers.jpg); background-size:cover;">
        <h1>about us</h1>
        <p>Bringing You the Freshest Blooms, Where Every Bloom Tells a Story!</p>
    </div>

    <div class="about" >
        <div class="row">
            <div class="detail">
                <h1>visit our beautiful showroom</h1>
                <p>"Step into Petals and experience a world of beauty! 🌸✨ Visit our showroom to explore the freshest blooms, stunning arrangements, and elegant floral designs crafted just for you. Let nature’s charm inspire your special moments! 🌿💐"</p>
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
                <p>Bloom & Save Today! 🌿💐</p>
            </div>
            <div class="box">
                <i class="bi bi-asterisk"></i>
                <h3>Freshest blooms</h3>
                <p>🌸 Freshest Blooms, Handpicked for You! 🌿</p>
            </div>
            <div class="box">
                <i class="bi bi-alarm"></i>
                <h3>super flexible</h3>
                <p>"🌿 Super Flexible, Just Like Nature! 🌸✨"</p>
            </div>
        </div>
    </div>

    <div class="stylist">
        <h1 class="title">Florial stylist</h1>
        <p>Meet the Team that makes miracles happen </p>
        <div class="box-container">
            <div class="box">
                <div class="img-box">
                    <img src="images/designer.jpg">
                    <div class="social-links">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-youtube"></i>
                        <i class="bi bi-whatsapp"></i>
                        <i class="bi bi-tiktok"></i>
                    </div>
                </div>
                <h4>Sara Smith</h3>
                <p>Floral Designer</p>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="images/manager.jpg">
                    <div class="social-links">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-youtube"></i>
                        <i class="bi bi-whatsapp"></i>
                        <i class="bi bi-tiktok"></i>
                    </div>
                </div>
                <h4>John Arther</h3>
                <p>Stock Manager</p>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="images/sales.jpg">
                    <div class="social-links">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-youtube"></i>
                        <i class="bi bi-whatsapp"></i>
                        <i class="bi bi-tiktok"></i>
                    </div>
                </div>
                <h4>Noah De</h3>
                <p>Sales Associate</p>
            </div>
        </div>
    </div>
    <!--<div class="testimonial-container">
        <h1 class="title">what people say</h1>
        <div class="container">
            <div class="testimonial-item active">
                <img src="images/orchid.jpg" width="100" height="100">
                <h3>sara smith</h3>
                <p>um sara from califonia bla bla blaaaaaaaa</p>
            </div>
            <div class="testimonial-item">
                <img src="images/orchid.jpg" width="100" height="100">
                <h3> smith</h3>
                <p>um sara from califonia bla bla blaaaaaaaa</p>
            </div>
            <div class="testimonial-item">
                <img src="images/orchid.jpg" width="100" height="100">
                <h3>sara </h3>
                <p>um sara from califonia bla bla blaaaaaaaa</p>
            </div>
            <div class="left-arrow" onclick="nextSlide()"><i class="bi bi-arrow-left"></i></div>
            <div class="right-arrow" onclick="prevSlide()"><i class="bi bi-arrow-right"></i></div>
        </div>
    </div>-->


    <?php include 'footer.php' ?>
    <script >
        /*----------testimonial------------------------------------ */
let slides=document.querySelectorAll('.testimonial-item');
let index = 0;
function nextSlide(){
    slides[index].classList.remove('active')
    index=(index+1)%slides.length
    slides[index].classList.add('active')
}

function prevSlide(){
    slides[index].classList.remove('active')
    index=(index-1+slides.length)%slides.length
    slides[index].classList.add('active')
}

    </script>
</body>
</html>