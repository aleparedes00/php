<?php
/**
 * Created by PhpStorm.
 * User: alejandraparedes
 * Date: 6/26/17
 * Time: 11:15 AM
 */
$bdd = new PDO('mysql:host=localhost;dbname=classroom', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$base_query = 'SELECT console, nom FROM jeux_video WHERE';
$choice = $_POST['check_list'];
for ($i = 0; $i < sizeof($choice); $i++) {
    $base_query .= ' console = ?';
    if ($i < sizeof($choice) - 1) {
        $base_query .= ' OR';
    }
    var_dump($base_query);
}
    $requete = $bdd->prepare($base_query);
    if (!isset($_POST['check_list'])) {
        echo '<p> Please check something you idiot!! </p>';
    } else {
        $requete->execute($_POST['check_list']);
        while ($item = $requete->fetch(PDO::FETCH_ASSOC)) {
            echo '<p> ' . $item['console'] . '-' . $item['nom'] . '</p>';
        }
    }

?>