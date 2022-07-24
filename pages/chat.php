<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/chat.css">
    <script src="https://kit.fontawesome.com/bf33c26d23.js" crossorigin="anonymous" defer></script>
    <title>Chit Chat | Chat</title>
</head>
<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: signIn");
}
?>

<body>
    <div class="wrapper">
        <section class="chat__area">
            <header>
                <?php
                    include_once "../php/config.php";
                    $uid = mysqli_real_escape_string($connection, $_GET['user_id']);
                    $sql = mysqli_query($connection, "SELECT * FROM users WHERE unique_id = '{$uid}'");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <a href="users"><i class="fas fa-arrow-left"></i></a>
                <img src="../php/images/<?php echo $row['img']; ?>" alt="" class="profile__image">
                <div class="details">
                    <span class="profile__name"><?php echo $row['fname'] . " " . $row['lname'] ?></span>
                    <p class="status"><?php echo $row['status']; ?></p>
                </div>
            </header>
            <div class="chat__box" id="chat__box"></div>
            <form action="#" class="typing__area">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $uid; ?>" hidden>
                <input type="text" name="message" id="input" name="message" placeholder="Type a message here...">
                <button type="submit" id="btn"><i class="fa-solid fa-paper-plane"></i></button>
            </form>
        </section>
    </div>
</body>
<script src="../js/chat.js"></script>
</html>