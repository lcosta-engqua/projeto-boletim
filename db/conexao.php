<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'boletim';

try{
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Sucesso na conexão!";
}catch(Exception $e){
  echo "Falha na conexão: " . $e->getMessage();
}

?>