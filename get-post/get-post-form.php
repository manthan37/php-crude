<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="form.css"> 
</head>
<body>
    <form action="get.php" class="box-1" method="get">
        <h1>Using GET</h1>
        <input type="text" name = "user-1" placeholder="Username">
        <input type="password" name="password" placeholder="password">
        <input type="submit" class="btn" value="Login">
    </form>
    <form action="post.php" class="box-2" method="post">
        <h1>Using POST</h1>
        <input type="text" name = "user-2" placeholder="Username">
        <input type="password" name="password" placeholder="password">
        <input type="submit" class="btn" value="Login">
    </form>
    
</body>
</html>