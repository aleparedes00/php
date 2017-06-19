<!DOCTYPE html>
<html>
<body>
<?php

$pass = (string) $_POST['password'];
htmlspecialchars($pass);
if (isset($pass) AND (strcmp('kangourou', $pass) == 0)) {
    echo 'Password verified <br />';
    echo 'Here are the codes you have been looking for...';
    include ("codes.html");
}
else
{
 echo 'Wrong password, ';
 echo "<a href=\"formulaire.php\">try again</a>";
}
    ?>
</body>
</html>