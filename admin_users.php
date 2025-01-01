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

/*-------------------------deleting users from database----------------------------------------- */
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    
    mysqli_query($conn,"DELETE FROM `users` WHERE id='$delete_id'") or die('query failed');
    header('location:admin_users.php');
}
/*--------------------------------------------------------------------------------------------------*/


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petals-Admin pannel</title>
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

    <section class="user-container">
        <h1 class="title">total registered users</h1>
        <div class="box-container">
        <?php
            $select_users = mysqli_query($conn,"SELECT * FROM `users`") or dir('query failed');
            if(mysqli_num_rows($select_users)>0){
                while($fetch_users = mysqli_fetch_assoc($select_users)){

                    ?>
                    <div class="box">
                        <p>user id : <span><?php echo $fetch_users['id'] ?></span></p>
                        <p>user name : <span><?php echo $fetch_users['name'] ?></span></p>
                        <p>email : <span><?php echo $fetch_users['email'] ?></span></p>
                        <p>type : <span style="color:<?php 
                                        if($fetch_users['user_type']=='admin'){
                                            echo 'orange';
                                        }
                                        ?> ;"><?php echo $fetch_users['user_type'] ?></span></p>

                        <a href="admin_users.php?delete=<?php echo $fetch_users['id'];?>" class="delete" onclick="return conform('Are you sure to delete thsi ?')">delete</a>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        
    </section>

    <script src="./js/script.js"></script>
</body>
</html>