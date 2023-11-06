<?php 

include('conexao.php');

$nomesala = $_POST['nome_sala'];

$data = $_POST['data'];
$horas = $_POST['horas'];
$minutos = $_POST['minutos'];

$datahora = $data . 'T' . $horas . ':' . $minutos;

echo $datahora;
echo "<br>";

$query = "insert into agendamentolaboratorio (data_hora , laboratorio) values ('".$datahora."',".$nomesala.");";
$result = mysqli_query($conn, $query);
$query2 = "update laboratorios set disponibilidade = false where id = ".$nomesala.";";
$result2 = mysqli_query($conn, $query2);
if ($result) {
    echo 'Cadastro Realizado';
    session_start();
    $_SESSION['sucessolaboratorio']= "Agendamento de laboratorio efetuado com sucesso";
    header("location: agendarlaboratorio.php");
}

else { 
    echo 'ERRO';
}

?>