<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <title>Dietpro</title>
    <?php include_once 'head.php';
    include_once 'verificaLogin.php';
    ?>

</head>

<body>

    <div id="fundoSistemaInterno" class="container">

        <nav id="teste" class="navbar navbar-dark" style="background-color:#3b884d;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span> <i class="fas fa-carrot animated rubberBand" style="font-size: 30px; color: #c78713"></i> &nbsp; <i class="fas fa-apple-alt animated rubberBand" style="font-size: 30px; color: #d83838"></i> &nbsp; <i class="fas fa-cheese animated rubberBand" style="font-size: 30px; color: #ccc624"></i> </span>
            </button>
        <div> <img src="img/icons8-checked-user-male-26.png" alt=""> <b> Bem vindo(a):</b> <?php echo "<i>"  .$_SESSION["login"] . "</i>" ; ?> <a style="text-decoration: none;" href="logout.php">&nbsp;<img id="logout" src="img/icons8-exit-48.png" alt=""></a> 
        </div>
        </nav>

        <div id="listNutri" class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
                Menu
            </a>
            <a href="#" class="list-group-item list-group-item-action">Dados do paciente <i class="fas fa-check" style="font-size: 10px; color: #3b884d"></i> </a>
            <a href="form-antropometria.php" class="list-group-item list-group-item-action">Av. Antropométrica</a>
            <a href="form-bioquiomica.php" class="list-group-item list-group-item-action">Av. Bioquímica</a>
            <a href="form-clinicaNutricional.php" class="list-group-item list-group-item-action">Av. Clínica nutri.</a>
            <a href="form-VetFao.php" class="list-group-item list-group-item-action">Vet FAO</a>
            <a href="tabelaAlimentos.php" class="list-group-item list-group-item-action">Lista de alimentos</a>
            <a href="#" class="list-group-item list-group-item-action">Recordatório 24h</a>
            <a href="form-Dietoterapia.php" class="list-group-item list-group-item-action">Dietoterapia</a>
            <a href="#" class="list-group-item list-group-item-action">Lista de substituições</a>
            <a href="#" class="list-group-item list-group-item-action">Impressão de dieta</a>
        </div>

        <h4 id="menuNutricionista">Menu Nutricionista &nbsp;<img src="img/icons8-plano-de-sa%C3%BAde-48.png" alt=""></h4>

        <a id="loopa" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><i class="fas fa-address-book" style="font-size: 26px; color: #4c89e3; margin-top: 50px; margin-left: 340px; margin-bottom: 10px;">&nbsp; <i class="fas fa-mouse-pointer animated rubberBand" style="font-size: 20px; color: black;"></i> Busca de pacientes </i></a>

        <form action="nutricionistaMenu.php" method="get">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6 ">
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card card-body" style="background-color: #4c89e3">
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
                    <th style="color: #E8850C">Telefone</th>
                    <th style="color: #E8850C">Endereço</th>
                    <th style="color: #E8850C">Cidade</th>
                    <th style="color: #E8850C">Estado civil</th>
                    <th style="color: #E8850C">Data de nascimento</th>
                    <th style="color: #E8850C">Excluir Paciente</th>
                </tr>



                <?php
                    while($row = mysqli_fetch_array($result))
                    {  
                        echo "<tr>"; ?>
                <td><i class="fas fa-book-open" style="color: #E8850C"></i></td>
                <?php
                        echo "<td>".$row["nome"]."</td>";
                        echo "<td>".$row["telefone"]."</td>";
                        echo "<td>".$row["endereco"]."</td>";
                        echo "<td>".$row["cidade"]."</td>";
                        echo "<td>".$row["estado_civil"]."</td>";
                        echo "<td>".date('d-m-Y', strtotime($row["dt_nascimento"]))."</td>";  
                        echo "<td><a href='#' onclick='excluir(".$row["id_cliente"].")'><i class='far fa-trash-alt' style='padding-left: 25px' id='delet'></i></td>";
                        echo "</tr>";
                    } ?>
            </table>
        </div>
        <?php } 
                else
                {
                    ?>
        <div id="msgErro" class="alert alert-danger" role="alert">
            Nenhum registro encontrado
        </div>
        <?php  
                }
            }
        ?>



        <footer class="container" id="rodape">
            <?php include_once 'rodape.php'; ?>
        </footer>

    </div>

</body>

</html>
