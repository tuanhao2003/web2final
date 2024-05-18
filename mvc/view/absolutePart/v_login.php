<?php 
$controller = new c_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web2/public/css/login.css">
    <script src="/web2/public/js/login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Login</title>
</head>
<body>
<div class="wrapper">
        <div class="form-box login">
            <h2>Login</h2>
            <form action="<?php $controller->login(); ?>" method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <input type="text" name="username"  value="_" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="password"  required>
                    <label>Password</label>
                </div>
                
                <input type="submit" class="btn" value="Login">
                <div class="login-register">
                    <p?>Don't have an account? <a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <h2>Register</h2>
            <form action="<?php $controller->register(); ?>" method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <input type="text" name="registAccount"  value="_" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="registPass" required>
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="text" name="email" pattern="^[a-zA-Z0-9_]+@[a-zA-Z]+\.[a-zA-Z]{2,4}$" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="call-outline"></ion-icon></span>
                    <input type="text" name="phone" pattern="^[0-9]{10,11}$" required>
                    <label>Phone</label>
                </div>
                
                <input type="submit" class="btn" value="Regist">
                <div class="login-register">
                    <p?>Already havve an account? <a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>
