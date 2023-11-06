<?php 

include('conexao.php');

$datashow = $_POST['datashow'];

$data = $_POST['data'];
$horas = $_POST['horas'];
$minutos = $_POST['minutos'];

$datahora = $data . 'T' . $horas . ':' . $minutos;

echo $datahora;
echo "<br>";
echo $datashow;

$query = "insert into agendamentodatashow (data_hora , equipamento) values ('".$datahora."',".$datashow.");";
$result = mysqli_query($conn, $query);
$query2 = "update equipamentos set disponibilidade = false where id = ".$datashow.";";
$result2 = mysqli_query($conn, $query2);
if ($result) {
    session_start();
    $_SESSION['sucessodatashow']= "Agendamento de Equipamento realizado Datashow com sucesso";
    header("location: agendadatashow.php");
}
else {
    echo 'ERRO';
}
if($result2){
    echo 'datashow ja agendado';
}
?>