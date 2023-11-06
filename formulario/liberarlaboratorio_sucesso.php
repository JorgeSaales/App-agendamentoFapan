<?php
include('conexao.php');
$laboratorio = $_GET['laboratorio'];
echo $laboratorio;
$query = "update laboratorios set disponibilidade = true where id = ".$laboratorio.";";
$result = mysqli_query($conn, $query);
if ($result) {
    session_start();
    $_SESSION['sucessoliberacaodatashow']= "Liberação de Laboratório realizado com sucesso";
    header("location: liberacaolaboratorio.php");
}
else {
    echo 'ERRO';
}
?>