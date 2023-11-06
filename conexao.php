<?php
$servername = "127.0.0.1:3306";
$username = "u827545284_kajin";
$password = "Kajin151001";
$dbname = "u827545284_agendamentotcc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
