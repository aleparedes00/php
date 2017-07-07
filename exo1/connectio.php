<?php
/**
 * Created by PhpStorm.
 * User: alejandraparedes
 * Date: 6/29/17
 * Time: 12:30 PM
 */
$bdd = new PDO('mysql:host=localhost;dbname=classroom', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$choice = (string) $_POST['choice'];
if (isset($choice)) {
    $requete = $bdd->prepare('SELECT console, nom FROM jeux_video WHERE console = ?');
    $requete->execute(array($choice));
    while ($data = $requete->fetch()) {
        echo '<p> ' . $data['console'] . '-' . $data['nom'] . '</p>';