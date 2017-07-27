<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>AleAventura's Blog</title>
</head>
<body>
<div class="BG">
    <h1>AleAventura</h1>
    <?php
    $base = $bdd = new PDO('mysql:host=localhost;dbname=TP3', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $post = $base->prepare('SELECT id, title, post FROM billets WHERE id = ?');
    $post->execute(array($_GET['post']));
    $item = $post->fetch(PDO::FETCH_ASSOC)
    ?>

    <h4> <?php echo htmlspecialchars($item['title']);?> </h4>
    <p> <?php echo htmlspecialchars($item['post']); ?> </p> <br/>
    <h3>Comments: </h3> <br/>
    <?php
    $base = $bdd = new PDO('mysql:host=localhost;dbname=TP3', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $post = $base->prepare('SELECT auteur, comment, DATE_FORMAT(date_comment, \'%d/%m/%y\') AS date_comment_post FROM comments WHERE id_billet_fk = ? ORDER BY date_comment DESC');
    $post->execute(array($_GET['post']));
    while ($item = $post->fetch(PDO::FETCH_ASSOC))
    {?>
    <h2> <?php echo htmlspecialchars($item['auteur']);?> </h2><br/>
    <p> <?php echo htmlspecialchars($item['date_comment_post']); ?> </p> <br/>
    <p> <?php echo htmlspecialchars($item['comment']); ?> </p> <br/>
    <?php }

$post->closeCursor();
    ?>

</div>
</body>
</html>
