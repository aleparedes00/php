<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>AleAventura's Blog</title>
</head>
<style>

body {
    text-align: center;
    font-family: Roboto;
    margin: 0px 400px;
}
.BG
{background-color:rgb(255, 255, 255);}

    h1{
        background-color: turquoise;
        color: black;
        margin: 10px;
        padding: 15px;
        border-radius: 10px;
        font-family: "Amatic SC";
        font-size: 4em;
    }
    h4
    {
        background-color: antiquewhite;
        font-size: 1.5em;
        border-radius: 10px;
    }
    p{
    font-size: 1.5em;
        text-align: left;

    }
</style>

<body>
<div class="BG">
<h1>AleAventura</h1>
<h2>Crazy and ramdon ideas</h2>
<?php
/**
 * Created by PhpStorm.
 * User: alejandraparedes
 * Date: 7/11/17
 * Time: 3:38 PM
 */
$base = $bdd = new PDO('mysql:host=localhost;dbname=TP3', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$post = $base->prepare('SELECT id, title, post, DATE_FORMAT(date_creation, \'%d/%m/%Y at %Hh%imin%ss\') AS date_creation_print FROM billets ORDER BY id '); //Q:dois-je utiliser AS apres que j'ai utilise DATE_FORMAT ?
$post->execute();
while ($item = $post->fetch(PDO::FETCH_ASSOC)) //to show the post
{
    echo '<h4>'. $item['title'] .'</h4>' . '<br/>' . '<p>' . $item['post'] . '</p>' . '<br/>' . '<p class"time">' . $item['date_creation_print'] . '</p>';?>

    <a href="comments.php?post=<?php echo $item['id']; //using a get methode to pass the id where it click?>">Comments</a>

   <?php
}
$post->closeCursor(); //end of the query and open at the same time for another query
?>
</div>
</body>
</html>

