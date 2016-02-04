<?php
try
{

$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$connexion  = new PDO('mysql:host=localhost;dbname=ist_anosy', 'root','',$pdo_options);
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}

?>