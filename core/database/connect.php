<?php
$host='localhost';
$user='root';
$password='mysql';
$dbname='Tenis';

$connection = new PDO ("mysql:host=" . $host . ";dbname=" . $dbname, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) );
$connection->query("SET character_set_results='utf8'");  //Para ver Unicode-8 no browser
 
echo("<p>Ligado à base de dados da Equipa de Ténis como $user</p>\n");

?>
