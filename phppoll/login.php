<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #071832;
        }

        section{
            background-color: #ececec;
            padding: 10px;
            display: flex;
            flex-direction: column;
            width: 400px;
            border-radius: 5px;
        }

        form{
            display: flex;
            flex-direction: column;
        }

        form input {
            margin: 5px 0;
            padding: 5px 5px;
            outline: 0;
            border: 1px solid #000;
            border-radius: 5px;
        }

        form input[type="submit"]{
            background-color: #071832;
            border: 0;
            color: #ececec;
        }
    </style>

<?php
    $SERVERNAME = 'localhost';
    $USERNAME = 'root';
    $PASSWORD = '';
    
    try {
        $db = new PDO("mysql:host=$SERVERNAME;dbname=user", $USERNAME, $PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        # echo "connection success!";
    } catch (PDOException $e) {
        echo "error :".$e->getMessage();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
            if ($email != "" && $password != "") {
                # connection to the database
                $req = $db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
                $rep = $req->fetch();

                if ($rep['id'] != false){
                    # it's ok
                    header("Location: public.php");
                    exit();
                }else {
                    ?>
                    <p><?php echo "email or password uncorrect"; ?></p> 
                    <?php
                }
            }
    }
?>
    <section>
    <form method="post" action="">
        
        <input type="email" id="email" name="email" placeholder="enter your email" required>
        <br>
        
        <input type="password" id="password" name="password" placeholder="enter your password" required>
        <br>
        <input type="submit" value="login in" name="ok">
    </section>
    </form>
   

</body>
</html>