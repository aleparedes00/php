<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <title>AleAventura Chat</title>
</head>
<style>
    body{
        text-align: center;
        font-family: "Arial";
    }
    h1{
        font-size: 2em;
    }
    form {
        font-size: 1em;
    }

</style>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: alejandraparedes
 * Date: 7/7/17
 * Time: 1:08 PM
 */

$bdd = new PDO('mysql:host=localhost;dbname=TP_openclassroom', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>
<h1>Welcome to my AleAventura's center message</h1>
<form method="post" action="minichat_back.php">
Username:<input type="text" name="username" required/>
    Message:<textarea name="message" rows="4" cols="50" dirname="message.dir" required></textarea><br>
    <input type="submit">
</form>
<?php
$msg = $bdd->prepare('SELECT * FROM mini_chat ORDER BY id DESC LIMIT 10');
$msg->execute();
while ($item = $msg->fetch(PDO::FETCH_ASSOC)) {
    echo '<p>' . $item['username'] . ' says "' . $item['message'] . '"</p>';
}
?><br>
</body>
</html>