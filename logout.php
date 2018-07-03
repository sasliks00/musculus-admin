
<?php
session_start();
//Izbeidz pašreizējo pieslēgumu
session_destroy();
//Dodas atpakaļ uz "admin.php"
header('Location: admin.php');
exit;
?>