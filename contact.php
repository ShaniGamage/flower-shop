<?php
include 'connection.php';
session_start();

$user_id= $_SESSION['user_id'];
if(!isset($user_id)){
    header('location:login.php');
}


/* --------------send message ----------------*/
if(isset($_POST['submit-btn'])){
    $name = mysqli_escape_string($conn,$_POST['name']);
    $email = mysqli_escape_string($conn,$_POST['email']);
    $number = mysqli_escape_string($conn,$_POST['number']);
    $message = mysqli_escape_string($conn,$_POST['message']);

    $select_message = mysqli_query($conn,"SELECT * FROM `message` WHERE name='$name' AND email='$email' AND number='$number' AND message='$message'") or die('query failed');
    if(mysqli_num_rows($select_message)){
        echo 'message aleady send';
    }else{
        mysqli_query($conn,"INSERT INTO `message`(`user_id`,`name`,`email`,`number`,`message`) VALUES('$user_id','$name','$email','$number','$message')") or die('query failed');
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
        <h1>contact us</h1>
        <p>Bringing You the Freshest Blooms, Where Every Bloom Tells a Story!</p>
    </div>
    <div class="help">
        <h1 class="title">need help</h1>
        <div class="box-container">
            <div class="box">
                <div>
                    
                    <h2>address</h2>
                </div>
                <p>No.28, Stubbs place, colombo 05.</p> 
            </div>
            <div class="box">
                <div>
                    
                    <h2>opening</h2>
                </div>
                <p>9.00AM - 8.00PM</p> 
            </div>
            <div class="box">
                <div>
                    
                    <h2>our contact</h2>
                </div>
                <p>+94-778234567</p> 
            </div>
            <div class="box">
                <div>
                    
                    <h2>special offer</h2>
                </div>
                <p>upto 40% discount on february</p> 
            </div>
        </div>
    </div>
    
    <div class="form-container">
        <div class="form-section">
            <form method="post">
                <h1>send us your question</h1>
                <p>we will get back within to you two days.</p>
                <div class="input-field">
                    <label>your name</label>
                    <input type="text" name="name">
                </div>
                <div class="input-field">
                    <label>your email</label>
                    <input type="text" name="email">
                </div>
                <div class="input-field">
                    <label>your number</label>
                    <input type="text" name="number">
                </div>
                <div class="input-field">
                    <label>message</label>
                    <textarea name="message"></textarea>
                </div>
                <input type="submit" name="submit-btn" class="btn" value="send message" >
            </form>
        </div>
    </div>
    

    <?php include 'footer.php' ?>
</body>
</html>