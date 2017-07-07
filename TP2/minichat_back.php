<?php
/**
 * Created by PhpStorm.
 * User: alejandraparedes
 * Date: 7/7/17
 * Time: 1:14 PM
 */
$bdd = new PDO('mysql:host=localhost;dbname=TP_openclassroom', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
if (isset($_POST['username']) AND isset($_POST['message']))
{
$user = (string) $_POST['username'];
htmlspecialchars($user);
$message = (string) $_POST['message'];
htmlspecialchars($message);
$newMsg = $bdd->prepare('INSERT INTO mini_chat(username, message) VALUES( ?, ?)');
$newMsg->execute(array($user, $message));
include ("minichat_form.php");
}
