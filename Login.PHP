<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="logincss.css?v=<?php echo time();?>">
   
</head>
<body>
    <div class="container">
        <form id="form" action="session.php" method="POST">
            <h1>Login</h1>
            <div class="input-control">
                <label for="username">Username</label>
                <input id="usernames" name="usernames" type="text">
                <div class="error"></div>
            </div>
       
            <div class="input-control">
                <label for="password">Password</label>
                <input id="passwords"name="passwords" type="password">
                <div class="error"></div>
            </div>
            
              <a href="register.php"><h4>Don't have a account?</h4></a>
           
            <button type="submit">Sign In</button>
        </form>
    </div>
    
</body>
</html>