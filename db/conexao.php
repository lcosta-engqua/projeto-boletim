<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'boletim';

$conn = new mysqli($servername, $username, $password);
if(mysqli_connect_error()){
  die("Falha na conexão:" . mysqli_connect_error());
}
echo "Sucesso na conexão";
$conn->close();
?>