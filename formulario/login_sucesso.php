<?php
include("conexao.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "select * from users where email = '".$email."' and senha = '".$senha."';";

$result = mysqli_query($conn, $sql);
$assoc = mysqli_fetch_assoc($result);

$rows = mysqli_num_rows($result);

if ($rows>0) {
    session_start();
    $_SESSION['nome'] = $assoc['nome'];
    $_SESSION['email'] = $assoc['email'];
    $_SESSION['admin'] = $assoc['admin'];
    
    header("Location: menu.php");
}

else {
    session_start();
    $_SESSION['errologin'] = 'Essa conta não existe';
    header("location: index.php");
}