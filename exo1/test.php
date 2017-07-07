<?php
/**
 * Created by PhpStorm.
 * User: alejandraparedes
 * Date: 6/27/17
 * Time: 11:13 AM
 */


$bdd = new PDO('mysql:host=localhost;dbname=classroom', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$requete = $bdd->query('SELECT DISTINCT console FROM jeux_video ');
?>


<!DOCTYPE html>
<html>
<body>
<form action="jeux_video.php" method="post">
    <p>Please Select from:</p>
    <?php
    while($row = $requete->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <input type="checkbox" name="check_list[]" value="<?php echo implode($row); ?>"><?php echo implode($row); ?><br>
        <?php }
        ?>
    <input type="submit" value="Submit">
</form>
</body>
</html>




