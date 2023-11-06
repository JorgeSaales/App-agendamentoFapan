<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['laboratorio'])) {
    $id_lab = intval($_GET['laboratorio']);

    $sql = "DELETE FROM laboratorios WHERE id=$id_lab";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['sucesso'] = "Laboratório removido com sucesso!";
    } else {
        $_SESSION['erro'] = "Erro ao remover laboratório: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    $_SESSION['erro'] = "Requisição inválida ou ID do laboratório não fornecido.";
}

header("Location: liberacaolaboratorio.php");
exit();
?>
