<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['datashow'])) {
    $id_datashow = $_GET['datashow'];

    $sql = "DELETE FROM equipamentos WHERE id=$id_datashow";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['sucesso'] = "Datashow removido com sucesso!";
    } else {
        $_SESSION['erro'] = "Erro ao remover datashow: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    $_SESSION['erro'] = "Requisição inválida ou ID do datashow não fornecido.";
}

header("Location: liberacaodatashow.php");
exit();
?>
