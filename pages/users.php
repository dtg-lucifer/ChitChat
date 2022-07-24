<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/home.css">
    <script src="https://kit.fontawesome.com/bf33c26d23.js" crossorigin="anonymous" defer></script>
    <title>Chit Chat | Home</title>
</head>
<?php
    session_start();
    if(!isset($_SESSION['unique_id'])) {
        header("location: signIn");
    }
?>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <?php 
                    include_once "../php/config.php";
                    $sql = mysqli_query($connection, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                    if(mysqli_num_rows($sql) > 0) {
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <div class="content">
                    <img src="../php/images/<?php echo $row['img']; ?>" alt="" class="profile__image">
                    <div class="details">
                        <span class="profile__name"><?php echo $row['fname'] . " " . $row['lname'] ?></span>
                        <p class="status"><?php echo $row['status']; ?></p>
                    </div>
                </div>
                <a href="../php/logout?logout_id='<?php echo $row['unique_id'] ?>'" class="logout">Log Out</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search..">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="user__list">

            </div>
        </section>
    </div>
</body>
<script src="../js/users.js"></script>
</html>