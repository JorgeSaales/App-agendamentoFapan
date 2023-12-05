<?php
session_start();
?>

<div class="bg-light border-right" id="sidebar-wrapper" style="background:#008241!important;">
    <?php if(isset($_SESSION['nome'])): ?>
    <div class="sidebar-heading">
            	<p id="sidebar-heading-name">Olá, <?=$_SESSION['nome']?></p>
            	<div class="sidebar-button" onclick="sair()"><img class="sidebar-button-img" src="../assets/exit.png"></div>
    </div>
    <?php endif; ?>
            
            <div class="sidebar-heading">
            	<p id="sidebar-heading-title">Menu Lateral</p>
            	<div class="sidebar-button" onclick="sideBarSwitch()"><img class="sidebar-button-img" src="../assets/sidebar-icon.png"></div>
            </div>
            <div class="list-group list-group-flush">
                <!--<a href="dadoscadastrais" id="dadoscadastrais" class="list-group-item list-group-item-action bg-light">Dados Cadastrais</a>-->
                <a href="agendadatashow.php" id="agendadatashow" class="list-group-item list-group-item-action bg-light">Agendar Datashow</a>
                <a href="agendarlaboratorio.php" id="agendarlaboratorio" class="list-group-item list-group-item-action bg-light">Agendar Laboratorio</a>
                <a href="liberacaodatashow.php" id="liberacaodatashow" class="list-group-item list-group-item-action bg-light">Agendamentos de Recursos</a>
                <a href="liberacaolaboratorio.php" id="liberacaolaboratorio" class="list-group-item list-group-item-action bg-light">Agendamentos de Salas</a>
                <?php if($_SESSION['admin']==true): ?>
                <a href="listadatashow.php" id="listadatashow" class="list-group-item list-group-item-action bg-light">Lista de Recursos</a>
                <a href="listalaboratorio.php" id="listalaboratorio" class="list-group-item list-group-item-action bg-light">Lista de Salas</a>
                <a href="listausuarios.php" id="listausuarios" class="list-group-item list-group-item-action bg-light">Lista de Usuários</a>
                <a href="cadastro.php" id="cadastro" class="list-group-item list-group-item-action bg-light">Cadastro de Recursos</a>
                <?php endif; ?>
            </div>
        </div>