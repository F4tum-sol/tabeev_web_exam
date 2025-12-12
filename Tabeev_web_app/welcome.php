<?php
session_start(); 

if (!isset($_SESSION['auth'])) {
    header("Location: login.php");
    exit;
}
$user = htmlspecialchars($_SESSION['auth'], ENT_QUOTES, 'UTF-8'); 
?>
<h1>Привет, <?php echo $user; ?></h1>
<a href="logout.php">Выйти</a>