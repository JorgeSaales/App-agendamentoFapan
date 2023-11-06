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
    <title>Pagina De Agendamento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="../assets/fapan.png">
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
    <div class="d-flex" id="wrapper">
    <?php include("menulateral.php"); ?>
        
        <div id="page-content-wrapper" class="container-fluid">
            <h1 class="mt-4 mb-4">Agendamento de datashow</h1>
            <div class="card">
                <div class="card-body">
                    <?php if(isset($_SESSION['sucessolaboratorio'])): ?>
                    <div class="alert alert-success" role="alert"><?=$_SESSION['sucessolaboratorio']?></div>
                    <?php unset($_SESSION['sucessolaboratorio']); endif; ?>
                    <form action="agendarlaboratorio_sucesso.php" method="POST">

                        <label for = "data_hora">
                        Selecione hora e data do agendamento:
                    </label>
                <input type = "date" required class="form-control" id = "data" name = "data">
                <br>
                <label for = "horas">
                        Selecione a hora:
                </label>
                <select class="form-control" name="horas">
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                </select>
                <br>
                <label for = "minutos">
                        Selecione os minutos:
                </label>
                <select class="form-control" name="minutos">
                <option value="00">00</option>
                <option value="30">30</option>
                </select>
                <label for = "nome_sala">
                    Escolha os laboratorios disponiveis:
                </label>
                <select class="form-control" name="nome_sala" required>
                <?php
                            $sql = "select * from laboratorios where disponibilidade = true;";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                while ($assoc = mysqli_fetch_assoc($result)) {
                                    echo '<option value="'.$assoc['id'].'">'.$assoc['Nome_Sala'].'</option>';
                                }
                            } else {
                                echo "Erro ao executar a consulta: " . mysqli_error($connect);
                            }
                ?>
                </select>     
                <br>
                <button type="submit" class="btn btn-primary">Agendar laboratorio</button>
                </form>
                </div>
            </div>
        </div>
    </div>
        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>