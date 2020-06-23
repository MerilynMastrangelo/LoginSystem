<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginSystem</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap" rel="stylesheet">

</head>
<body>
    <header>
        <nav class="navbar">
            <div id="logo">
                <a href="index.php"><span class="login">LOGIN</span><span class="system">SYSTEM</span></a>
            </div>
            <div class="navbar-menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Portofolio</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="loginbar">
                <form class="login-form" action="includes/login.inc.php" method="post">
                    <input type="text" name="mailuid" placeholder="Username/Email...">
                    <input type="password" name="pwdiud" placeholder="Password...">
                    <button class="button" type="submit" name="login-submit">Login</button>
                </form>
            </div>
            <div class="signup-logout">
                <div class="signup">
                <a href="signup.php">Signup</a>
            </div>
            <div class="signup">
                <form action="includes/logout.inc.php" method="post">
                    <button class="button" type="submit" name="logout-submit">Logout</button>
                </form>
            </div>
            </div>
        </nav>
    </header>
</body>
</html>