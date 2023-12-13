<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body>
    <form method="POST" action="treatment.php">
        <label for="name">name</label>
        <input type="text" id="name" name="name" placeholder="enter your name" required>
        <br>
        <label for="email">email</label>
        <input type="text" id="email" name="email" placeholder="enter your email" required>
        <br>
        <label for="password">password</label>
        <input type="password" id="password" name="password" placeholder="enter your password" required>
        <br>
        <input type="submit" value="register" name="ok">
    </form>
</body>
</html>