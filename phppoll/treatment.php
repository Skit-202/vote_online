<?php 
$SERVERNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';

try {
    $db = new PDO("mysql:host=$SERVERNAME;dbname=user", $USERNAME, $PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "connection success!";
} catch (PDOException $e) {
    echo "error :".$e->getMessage();
}

if (isset($_POST["ok"])) {
    $name=$_POST["name"];
    $email=$_POST["email"];
    $pass=$_POST["password"];

    $request = $db->prepare("INSERT INTO users VALUES (0, :name, :email, :password)");
    $request->execute(
        array(
            "name" => $name,
            "email" => $email,
            "password" => $pass
        )
    );
    $response = $request->fetchAll(PDO::FETCH_ASSOC);
    
}
?>