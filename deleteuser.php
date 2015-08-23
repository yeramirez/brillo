<?php

$user = 'root';
$pass = 'root';

$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);
$userid = $_GET['id'];
$stmt=$dbh->prepare('DELETE FROM brillo where id in (:userid);');
$stmt->bindParam(':userid', $userid);
$stmt->execute();
header('Location: main.php');
die();
?>
