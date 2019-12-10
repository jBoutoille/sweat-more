<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'sweatmore';

try
{
    $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $database . ';charset=utf8', $user, $password);
}
catch(Exception $e)
{
    die('Erreur: ' . $e->getMessage());
}
?>
