<?php
session_start();
include("conexao.php");
include("checkAdmin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>autorização de laboratorio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="../assets/fapan.png">
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
    <div class="d-flex" id="wrapper">
    <?php include("menulateral.php"); ?>
        
        <div id="page-content-wrapper" class="container-fluid">
            <h1 class="mt-4 mb-4">Liberação de Laboratório</h1>
            <div class="card">
                <div class="card-body">
                <?php if(isset($_SESSION['sucessoliberacaolaboratorio'])): ?>
                    <div class="alert alert-success" role="alert"><?=$_SESSION['sucessoliberacaolaboratorio']?></div>
                    <?php unset($_SESSION['sucessoliberacaolaboratorio']); endif; ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                    <th scope="col">Nome da Sala</th>
                    <th scope="col">Nº de Cadeiras</th>
                    <th scope="col">Data</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            $sql = "select agendamentolaboratorio.laboratorio as laboratorio_id, laboratorios.Nome_Sala as laboratorio_nome, laboratorios.cadeiras as numero_cadeiras, laboratorios.disponibilidade as disponibilidade, agendamentolaboratorio.data_hora as agendamentodatahora from agendamentolaboratorio inner join laboratorios on agendamentolaboratorio.laboratorio = laboratorios.id;";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                while ($assoc = mysqli_fetch_assoc($result)) {
                                    echo '
                                    <tr>
                                    <th scope="row">'.$assoc['laboratorio_nome'].'</th>
                                    <th scope="row">'.$assoc['numero_cadeiras'].'</th>
                                    <td>'.date('d/m/Y', strtotime($assoc['agendamentodatahora'])).'</td>
                                    <td>'.date('H:i', strtotime($assoc['agendamentodatahora'])).'</td>
                                    ';
                                    if($assoc['disponibilidade']==false){
                                        echo '<td><a href = "liberarlaboratorio_sucesso.php?laboratorio='.$assoc['laboratorio_id'].'"><button type="button" class="btn btn-success">Liberar</button></a></td>';
                                    }
                                    else {
                                        echo '<td>Disponivel</td>';
                                    }
                                    echo '<td><a href = "editarlaboratorio.php?laboratorio='.$assoc['laboratorio_id'].'"><button type="button" class="btn btn-primary">Editar</button></a></td>';
                                    echo '<td><a href = "removerlaboratorio.php?laboratorio='.$assoc['laboratorio_id'].'"><button type="button" class="btn btn-danger">Remover</button></a></td>';
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