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

    <div id="fundoSistemaInterno" class="container">

        <nav class="navbar navbar-dark container" style="background-color:#3b884d;">
            <button id="teste" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span> <i class="fas fa-carrot animated rubberBand" style="font-size: 30px; color: #c78713"></i> &nbsp; <i class="fas fa-apple-alt animated rubberBand" style="font-size: 30px; color: #d83838"></i> &nbsp; <i class="fas fa-cheese animated rubberBand" style="font-size: 30px; color: #ccc624"></i> </span>
            </button>
            <div> <i id="usuarioLogado" class="fas fa-user-check"></i> <b>Bem-vindo nutricionista:</b>
                <?php echo "<i id='paciente'>"  .$_SESSION["login"] . "</i>" ; ?> <a style="text-decoration: none;" href="logout.php">&nbsp;<img id="logout" src="img/icons8-exit-48.png" alt=""></a>
            </div>
        </nav>

        <div id="listNutri" class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
                Menu
            </a>
            <a href="#" class="list-group-item list-group-item-action">Dados do paciente <i class="fas fa-check" style="font-size: 10px; color: #3b884d"></i> </a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Av. Antropométrica<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Av. Bioquímica<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Av. Clínica nutri.<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Vet FAO<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuAberto" id="menuFechado" href="tabelaAlimentos.php" class="list-group-item list-group-item-action">Lista de alimentos<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action">Recordatório 24h</a>
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
                        <div class="card card-body" style="background-color: #6c7481">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                                <input type="text" id="txt_consulta" placeholder="Pesquise um Paciente" class="form-control" name="nome">
                                <button class="btn-success" type="submit"><i class="fas fa-search"></i></button>
                            </div>
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
                
                $sql = "select nome,telefone,endereco,cidade,estado_civil,dt_nascimento,sexo,id_cliente from cliente where nome like '".$nome."%'";
                
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
                    <th style="color: #E8850C">Cidade</th>
                    <th style="color: #E8850C">Data de nascimento</th>
                    <th style="color: #E8850C">Editar Paciente</th>
                    <th style="color: #E8850C">Excluir Paciente</th>
                </tr>



                <?php
                    while($row = mysqli_fetch_array($result))
                    { 
                        echo "<tr>";
                        echo "<td><a href='#' onclick='iniciarDieta(".$row["id_cliente"].")'> <i class='fas fa-book-open' title='Iniciar consulta' style='color: #E8850C'></i></td>";
                        echo "<td>".$row["nome"]."</td>";
                        echo "<td>".$row["telefone"]."</td>";
                        echo "<td>".$row["endereco"]."</td>";
                        echo "<td>".$row["cidade"]."</td>";
                        echo "<td>".date('d-m-Y', strtotime($row["dt_nascimento"]))."</td>"; 
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
