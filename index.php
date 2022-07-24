<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bf33c26d23.js" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="./css/signup.css">
    <link rel="stylesheet" href="./css/global.css">
    <title>Chit Chat | SignUp</title>
</head>
<?php
    session_start();
    if(isset($_SESSION['unique_id'])) {
        header("location: pages/users");
    }
?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Chit Chat</header>
            <form action="#" id="signup" enctype="multipart/form-data" autocomplete="off">
                <div class="err__text"></div>
                <div class="name__details">
                    <div class="field">
                        <label for="first__name">First Name</label>
                        <input type="text" name="first__name" placeholder="First Name" required>
                    </div>
                    <div class="field">
                        <label for="last__name">Last Name</label>
                        <input type="text" name="last__name" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="field">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="field" id="password">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                    <i id="eye" class="fas fa-eye"></i>
                </div>
                <div class="field profile__image">
                    <label for="profile__image">Select Image</label>
                    <input class="exclude" type="file" name="profile__image" accept=".jpg .png .webp" required>
                </div>
                <div class="field button">
                    <input class="exclude" type="submit" value="Submit - Goto Chat">
                </div>
                <div class="link">
                    Already a user? <a href="pages/signIn">Log in.</a>
                </div>
            </form>
        </section>
    </div>
</body>
<script src="js/signUp.js"></script>
<script src="js/passShowHide.js"></script>
</html>