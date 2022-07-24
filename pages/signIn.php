<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bf33c26d23.js" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../css/signin.css">
    <link rel="stylesheet" href="../css/global.css">
    <title>Chit Chat | SignIn</title>
</head>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Chit Chat</header>
            <form action="#" id="signin" autocomplete="off">
                <div class="err__text"></div>
                <div class="field">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="field" id="password">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password">
                    <i id="eye" class="fas fa-eye"></i>
                </div>
                <div class="field" id="button">
                    <input class="exclude" type="submit" value="Submit - Goto Chat">
                </div>
                <div class="link">
                    Not registered? <a href="../index">Sign up.</a>
                </div>
            </form>
        </section>
    </div>
</body>
<script src="../js/passShowHide.js"></script>
<script src="../js/signIn.js"></script>
</html>