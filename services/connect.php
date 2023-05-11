<?php 
$host = 'localhost';
$dbname ='jeri_hoteis';
$user = 'root';
$password = '';

$conn = mysqli_connect($host, $user, $password, $dbname);

//checar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

?>
