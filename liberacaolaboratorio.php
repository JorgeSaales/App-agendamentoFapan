<?php
session_start();
include("conexao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamentos Laboratório</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="../assets/fapan.png">
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
    <div class="d-flex" id="wrapper">
    <?php include("menulateral.php"); ?>
        
        <div id="page-content-wrapper" class="container-fluid">
            <h1 class="mt-4 mb-4">Agendamentos de Laboratórios</h1>
            <div class="card">
                <div class="card-body">
                <?php if(isset($_SESSION['sucessolaboratorio'])): ?>
                    <div class="alert alert-success" role="alert"><?=$_SESSION['sucessolaboratorio']?></div>
                    <?php unset($_SESSION['sucessolaboratorio']); endif; ?>
                    
                <table class="table table-striped">
                    <thead>
                    <tr>
                    <?php if($_SESSION['admin']==true): ?>
                    <th scope="col">Usuário</th>
                    <?php endif?>
                    <th scope="col">Sala</th>
                    <th scope="col">Cadeiras</th>
                    <th scope="col">Data</th>
                    <th scope="col">Turno</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        if($_SESSION['admin']==true) {
                            $sql = "select agendamentolaboratorio.laboratorio as laboratorio_id, laboratorios.nome_sala as laboratorio_nome, laboratorios.cadeiras as laboratorio_cadeiras, agendamentolaboratorio.id as agendamento_id, agendamentolaboratorio.dataturno as agendamentodataturno, agendamentolaboratorio.turno as agendamentoturno, agendamentolaboratorio.ativo as agendamentoativo, users.nome as usuario from agendamentolaboratorio inner join laboratorios on agendamentolaboratorio.laboratorio = laboratorios.id inner join users on agendamentolaboratorio.usuario = users.id ORDER BY agendamento_id DESC;";
                        }
                        
                        else {
                           $sql = "select agendamentolaboratorio.laboratorio as laboratorio_id, laboratorios.nome_sala as laboratorio_nome, laboratorios.cadeiras as laboratorio_cadeiras, agendamentolaboratorio.id as agendamento_id, agendamentolaboratorio.dataturno as agendamentodataturno, agendamentolaboratorio.turno as agendamentoturno, agendamentolaboratorio.ativo as agendamentoativo, users.nome as usuario from agendamentolaboratorio inner join laboratorios on agendamentolaboratorio.laboratorio = laboratorios.id inner join users on agendamentolaboratorio.usuario = users.id WHERE users.id = ".$_SESSION['id']." ORDER BY agendamento_id DESC;";
                        }
                    
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                while ($assoc = mysqli_fetch_assoc($result)) {
                                    echo '<tr>';
                                    if($_SESSION['admin']==true) {
                                    echo '<th scope="row">'.$assoc['usuario'].'</th>';
                                    }
                                    echo '<th scope="row">'.$assoc['laboratorio_nome'].'</th>
                                    <th scope="row">'.$assoc['laboratorio_cadeiras'].'</th>
                                    <td>'.date('d/m/Y', strtotime($assoc['agendamentodataturno'])).'</td>
                                    <td>'.($assoc['agendamentoturno'] == 1 ? 'Manhã' : ($assoc['agendamentoturno'] == 2 ? 'Tarde' : ($assoc['agendamentoturno'] == 3 ? 'Noite' : 'Não'))) .'</td>
                                    <td>'.($assoc['agendamentoativo'] == 0 ? 'Cancelado' : 'OK').'</td>
                                    ';
                                    if($assoc['agendamentoativo']==1){
                                        echo '<td><a onclick="cancelalaboratorio('.$assoc['agendamento_id'].');"><button type="button" class="btn btn-danger">Cancelar</button></a></td>';
                                    }
                                    else {
                                        echo '<td></td>';
                                    }
                                    echo '</tr>';
                                }
                            } else {
                                echo "Erro ao executar a consulta: " . mysqli_error($connect);
                            }
                ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>