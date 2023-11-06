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
    <title>autorização de datashow</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="../assets/fapan.png">
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
    <div class="d-flex" id="wrapper">
    <?php include("menulateral.php"); ?>
        
        <div id="page-content-wrapper" class="container-fluid">
            <h1 class="mt-4 mb-4">Liberação de datashow</h1>
            <div class="card">
                <div class="card-body">
                <?php if(isset($_SESSION['sucessoliberacaodatashow'])): ?>
                    <div class="alert alert-success" role="alert"><?=$_SESSION['sucessoliberacaodatashow']?></div>
                    <?php unset($_SESSION['sucessoliberacaodatashow']); endif; ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                    <th scope="col">Identificação</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Série</th>
                    <th scope="col">Data</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            $sql = "select agendamentodatashow.equipamento as datashow_id, equipamentos.numero_identificacao as datashow_identificacao, equipamentos.marca as datashow_marca, equipamentos.numero_serie as datashow_serie, agendamentodatashow.data_hora as agendamentodatahora, equipamentos.disponibilidade as disponibilidade from agendamentodatashow inner join equipamentos on agendamentodatashow.equipamento = equipamentos.id;";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                while ($assoc = mysqli_fetch_assoc($result)) {
                                    echo '
                                    <tr>
                                    <th scope="row">'.$assoc['datashow_identificacao'].'</th>
                                    <th scope="row">'.$assoc['datashow_marca'].'</th>
                                    <td>'.$assoc['datashow_serie'].'</td>
                                    <td>'.date('d/m/Y', strtotime($assoc['agendamentodatahora'])).'</td>
                                    <td>'.date('H:i', strtotime($assoc['agendamentodatahora'])).'</td>
                                    ';
                                    if($assoc['disponibilidade']==false){
                                        echo '<td><a href = "liberardatashow_sucesso.php?datashow='.$assoc['datashow_id'].'"><button type="button" class="btn btn-success">Liberar</button></a></td>';
                                    }
                                    else {
                                        echo '<td>Disponivel</td>';
                                    }
                                    echo '<td><a href = "editardatashow.php?datashow='.$assoc['datashow_id'].'"><button type="button" class="btn btn-primary">Editar</button></a></td>';
                                    echo '<td><a href = "removerdatashow.php?datashow='.$assoc['datashow_id'].'"><button type="button" class="btn btn-danger">Remover</button></a></td>';
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