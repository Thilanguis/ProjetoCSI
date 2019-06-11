<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <title>Dietpro</title>
    <?php include_once 'head.php';
    include_once 'verificaLogin.php';
    include_once 'form-cadastroPacienteNovo.php';
    ?>

</head>

<body>

    <!-- input para pegar nome do nutricionista logado -->
    <input id="nutricionistaLogado" type="hidden" value="<?php echo $_SESSION["login"];  ?>">

    <div id="fundoSistemaInterno" class="container">

        <nav class="navbar navbar-dark container" style="background-color:#3b884d;">
            <button id="teste" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span> <i class="fas fa-carrot animated rubberBand" style="font-size: 30px; color: #c78713"></i> &nbsp; <i class="fas fa-apple-alt animated rubberBand" style="font-size: 30px; color: #d83838"></i> &nbsp; <i class="fas fa-cheese animated rubberBand" style="font-size: 30px; color: #ccc624"></i> </span>
            </button>
            <div> <i id="usuarioLogado" class="fas fa-user-check"></i> <b>Bem-vindo Nutricionista:</b>
                <?php echo "<i id='paciente'>"  .$_SESSION["login"] . "</i>" ; ?> <a style="text-decoration: none;" href="#" onclick="deslogar();">&nbsp;<img id="logout" src="img/icons8-exit-48.png" alt=""></a>
            </div>
        </nav>

        <div id="listNutri" class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
                Menu
            </a>
            <a href="#" class="list-group-item list-group-item-action">Dados do paciente <i class="fas fa-check" style="font-size: 16px; color: #3b884d"></i> </a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Av. Antropométrica<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Av. Bioquímica<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Av. Clínica nutri.<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Vet FAO<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuAberto" id="menuFechado" href="tabelaAlimentos.php" class="list-group-item list-group-item-action">Lista de alimentos<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
            <a id="menuAberto" href="receituario.php" class="list-group-item list-group-item-action">Receituário <i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Dietoterapia<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuAberto" href="listaSubstituicao.php" class="list-group-item list-group-item-action">Lista de subs.<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Impressão de dieta<i class="fas fa-lock" id="cadeadoFechado"></i></a>
        </div>

        <h4 id="menuNutricionista">Menu Nutricionista &nbsp;<img src="img/icons8-plano-de-sa%C3%BAde-48.png" alt=""></h4>

        <a id="loopa" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><i class="fas fa-address-book" style="font-size: 26px; color: #4c89e3; margin-top: 50px; margin-left: 340px; margin-bottom: 10px;">&nbsp; <i class="fas fa-mouse-pointer animated rubberBand" style="font-size: 20px; color: black;"></i> Busca de pacientes </i></a>

        <div id="pacientesCadastrados">
            <button type="button" class="badge badge-success">
                Pacientes cadastrados <span class="badge badge-light">

                    <?php 
        include_once 'conexao.php';
        
        $sql = "select NOME from cliente";
            
        $result = mysqli_query($con, $sql);
                
        $totalRegistros = mysqli_num_rows($result);
        
        echo $totalRegistros;
        ?>
                </span>
            </button>
        </div>

        <form action="nutricionistaMenu.php" method="get">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6 ">
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                            <input type="text" id="txt_consulta" placeholder="Pesquise um paciente pelo nome ou CPF" class="form-control" name="nome">
                            <button id="btnBuscaPaciente" class="btn btn-info" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <?php
            
            if(isset($_GET["nome"]))
            {
                $nome = $_GET["nome"]; 
                
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                include_once 'excluirCliente.php';
                
                $sql = "select nome,telefone,endereco,cidade,estado_civil,dt_nascimento,sexo,id_cliente, registro from cliente where nome like '".$nome."%' or cpf like '".$nome."%' order by registro asc ";
                
                $result = mysqli_query($con, $sql);
                
                $totalRegistros = mysqli_num_rows($result);
                
                if($totalRegistros > 0)
                { ?>
        <div class="table-overflow">
            <table id="tabelaConsultaPaciente" class="table table-dark table-striped container animated zoomIn">
                <tr>
                    <th><i class="fas fa-address-card" style="color: #E8850C"></i></th>
                    <th style="color: #E8850C">Nome</th>
                    <th style="color: #E8850C">Telefone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th style="color: #E8850C">Endereço</th>
                    <th style="color: #E8850C">Data de cadastramento</th>
                    <th style="color: #E8850C">Editar Paciente</th>
                    <th style="color: #E8850C">Excluir Paciente</th>
                </tr>



                <?php
                    
                echo "<p style='margin: 0px; padding: 0px;'><b>Legenda:&nbsp;</b> <i class='fas fa-book' style='color: #E8850C'></i> Paciente sem Dieta";
                echo "<p style='margin: 0px; padding: 0px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fas fa-book-open' style='color: #E8850C'></i> Paciente com Dieta</b>";
                    
                    while($row = mysqli_fetch_array($result))
                    { 
                        echo "<tr>";
                        
                        $sql2 = "select ID_CLIENTE from alimentos where id_cliente =".$row["id_cliente"];
                    
                $result2 = mysqli_query($con, $sql2);
                
                $totalRegistros2 = mysqli_num_rows($result2);
                        if ($totalRegistros2 > 0 ){
                            echo "<td><i class='fas fa-book-open' title='Paciente já tem consulta' style='color: #E8850C'></i></td>";
                        }
                        else {
                        echo "<td><a href='#' onclick='iniciarDieta(".$row["id_cliente"].")'> <i class='fas fa-book' title='Iniciar consulta' style='color: #E8850C'></i></td>";
                        }
                        
                
                $sql1 = "select ID_CLIENTE from alimentos where id_cliente =".$row["id_cliente"];
                    
                $result1 = mysqli_query($con, $sql1);
                
                $totalRegistros1 = mysqli_num_rows($result1);
                        
                        if ($totalRegistros1 > 0) {echo "<td id='consultandoDietaPacienteJaFeita'><a id='consultandoDietaPacienteJaFeita' href='#' onclick='consultarDieta(".$row["id_cliente"].")'><i id='consultandoDietaPacienteJaFeita'>".$row["nome"]."</i></td>";}
                        else{
                        echo "<td>".$row["nome"]."</td>";}
                        echo "<td>".$row["telefone"]."</td>";
                        echo "<td>".$row["endereco"]."</td>";
                        echo "<td>".date('d-m-Y H:i:s', strtotime($row["registro"]))."</td>"; 
                        echo "<td><a href='form-editarPacienteNovo.php?id_paciente=".$row["id_cliente"]."'><img src='img/icons8-editar-vários-128.png' alt='' style='padding-left: 15px; padding-top: 12px; width; 45px; height: 45px;'></td>";
                        echo "<td><a href='#' onclick='excluir(".$row["id_cliente"].")'><img src='img/icons8-lixo-30.png' style='padding-left: 17px; padding-top: 12px;' alt=''></td>";
                        echo "</tr>";
                    } ?>
            </table>
        </div>
        <?php } 
                else
                {
                    ?>
        <div id="msgErro1" class="alert alert-danger" role="alert">
            Nenhum registro encontrado
        </div>
        <?php  
                }
            }
        ?>


        <br><br>

        <!-- Agenda de marcação de consulta! -->

        <style>
            /* Teste de Estilos - colocar em arquivo separado */
            body {
                background-color: #dfe6e9;
            }

            #container {
                background-color: #fff;

                -webkit-box-shadow: 2px 2px 10px 0px rgba(0, 0, 0, 0.1);
                -moz-box-shadow: 2px 2px 10px 0px rgba(0, 0, 0, 0.1);
                box-shadow: 2px 2px 10px 0px rgba(0, 0, 0, 0.1);
                background-image: linear-gradient(to bottom, white, rgba(208, 235, 218, 0.63));

            }

            .statusDia {
                margin-bottom: 0px !important;
                color: #4c89e3;
            }

            .bg-info {
                border-radius: 10%;
                font-weight: bold;
                color: #fff;
            }

            table button {
                background-color: #fff;
            }

        </style>

        <hr>
        <br>

        <?php date_default_timezone_set('America/Sao_Paulo') ?><div class="float-right mr-5" id="demo"></div>

        <div class="float-right mr-5"><?php echo "Data de hoje: " . date('d/m/Y')?>
            <script>
                var myVar = setInterval(myTimer, 1000);

                function myTimer() {
                    var d = new Date(),
                        displayDate;
                    if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
                        displayDate = d.toLocaleTimeString('pt-BR');
                    } else {
                        displayDate = d.toLocaleTimeString('pt-BR', {
                            timeZone: 'America/Belem'
                        });
                    }
                    document.getElementById("demo").innerHTML = "Hora: " + displayDate;
                }

            </script>
        </div>
        <?php include 'banco.php'   ?>
        <?php include 'conexao.php' ?>
        <?php include 'helpers.php' ?>

        <br><br>
        <div class="container1" id="container">
            <div class="row justify-content-center">
                <div class="col">
                    <h2 id="menuNutricionista5" class="text-center">&nbsp;Agenda do Nutricionista<button style="text-decoration: none;" type="button" class="btn btn-sm btn-link" data-toggle="collapse" data-target="#agendamento" aria-expanded="false" aria-controls="agendar consulta">&nbsp;<img src="img/icons8-mais-calend%C3%A1rio-48.png" alt=""></button></h2>
                </div>
            </div>

            <!-- ------------  FAZER CADASTRO OU NOVO AGENDAMENTO ------------ -->
            <div class="row">
                <div class="col-sm-12 text-right">



                </div>
            </div>

            <div class="row collapse align-center" id="agendamento">
                <div class="col">
                    <?php if(count($_POST) == 0):  ?>
                    <!-- Formulario collapsed  -->
                    <form action="agendaBuscarCliente.php" method="POST">
                        <div class="form-row  align-items-center col-md-8">

                            <div class="col-md-4 form-group" style="text-align: center;">
                                <label for="inCliente">Cliente: <input type="text" class="form-control form-control-sm" name="inCliente" id="inCliente"></label>
                            </div>

                            <div class="col-md-4 form-group" style="text-align: center;">
                                <label for="inCPF">CPF: <input type="text" class="form-control form-control-sm" name="inCPF" id="inCPF"></label>
                            </div>

                            <button type="submit" class="btn btn-sm btn-info"> Buscar </button>
                        </div>
                    </form>
                    <?php else:?>
                    <?php include 'agendarCliente.php'; ?>
                    <?php endif; ?>


                </div>
            </div>
            <!--   MODAL - Formulário de Cadastro de Clientes -->
            <div class="modal fade" id="formCadastroCliente" tabindex="-1" role="dialog" aria-labelledby="CadastroCliente" aria-hidden="true">
                <?php include 'formCadastroCliente.php' ?>
            </div>

            <hr>
            <!-- ------------------------ CALENDÁRIO DE CONSULTAS ------------------------ -->
            <div class="row">
                <div class="col text-left">
                    <p style="margin-left: 25px;" class="statusDia">Consultas do dia: <span><?php echo dataFormat(verificaData(),'data'); ?></span></p>
                </div>
            </div>

            <div class="row">
                <?php $data = verificaData()?>
                <!-- ------------------------ Agenda de Clientes para a Data ------------------------ -->
                <div class="col">
                    <table class="table table-sm table-hover text-center">
                        <thead class="text-left">
                            <tr>
                                <th> Horário </th>
                                <th>Cliente</th>
                                <th> Telefone </th>
                                <th> Excluir </th>
                            </tr>
                        </thead>
                        <?php $agendados = buscarAgendados($con, $data); ?>
                        <?php foreach($agendados as $cliente): ?>
                        <tbody class="text-left">
                            <tr>
                                <?php $cliente['ID_CLIENTE'] ?>
                                <td><?php echo $cliente['hora'] ?></td>
                                <td><i style="color: #d83838" class="fas fa-user-circle"></i> <?php echo $cliente['NOME'] ?></td>
                                <td><?php echo $cliente['TELEFONE'] ?>
                                </td>
                                <?php echo "<td><a href='#' onclick='excluirConsulta(".$cliente["ID_CLIENTE"].")'><img src='img/icons8-lixo-30.png' style='padding-left: 13px; padding-top: 2px; width: 40px; height: 28px;' alt=''></td>"; ?>
                            </tr>
                        </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>

                <!-- ------------ Escolher Data ------------ -->
                <div class="col-4">
                    <form action="">
                        <div class="form-inline">
                            <input type="date" class="form-control mr-md-1 text-center" name="inDataAgenda" id="inDataAgenda" value="<?php echo $data ?>">
                            <button type="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col py-1 text-center">
                            <p class="diaCalendario rounded">
                                <?php echo dataFormat(verificaData(), 'dia');?>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div> <br>

        <!-- botão cadastrar novo paciente -->
        <div>
            <button type="button" class="btn btn-link" id="novaConsulta" data-toggle="modal" data-target="#exampleModalScrollable">
                <img src="img/icons8-adicionar-usu%C3%A1rio-grupo-homem-mulher-64.png" title="Cadastrar novo paciente" alt="Olá">
            </button>
        </div>

        <footer class="container" id="rodape">
            <?php include_once 'rodape.php'; ?>
        </footer>

    </div>

</body>

</html>
