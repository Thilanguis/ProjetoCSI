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


        <nav class="navbar navbar-dark container" style="background-color:#3b884d;">
            <button id="teste" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span> <i class="fas fa-carrot animated rubberBand" style="font-size: 30px; color: #c78713"></i> &nbsp; <i class="fas fa-apple-alt animated rubberBand" style="font-size: 30px; color: #d83838"></i> &nbsp; <i class="fas fa-cheese animated rubberBand" style="font-size: 30px; color: #ccc624"></i> </span>
            </button>
            <div> <i id="usuarioLogado" class="fas fa-user-check"></i> <b>Bem-vindo nutricionista:</b>
                <?php echo "<i id='paciente'>"  .$_SESSION["login"] . "</i>" ; ?> <a style="text-decoration: none;" href="#" onclick="deslogar();">&nbsp;<img id="logout" src="img/icons8-exit-48.png" alt=""></a>
            </div>
        </nav>

        <div id="listNutri" class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
                Menu
            </a>
            <a id="menuAberto" href="nutricionistaMenu.php" class="list-group-item list-group-item-action">Dados do paciente<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Av. Antropométrica<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Av. Bioquímica<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Av. Clínica nutri.<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Vet FAO<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a href="#" class="list-group-item list-group-item-action">Lista de alimentos <i class="fas fa-check" style="font-size: 17px; color: #3b884d"></i> </a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action">Recordatório 24h</a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Dietoterapia<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuAberto" href="listaSubstituicao.php" class="list-group-item list-group-item-action">Lista de subs.<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Impressão de dieta<i class="fas fa-lock" id="cadeadoFechado"></i></a>
        </div>

        <h4 id="menuNutricionista">Tabela de Alimentos&nbsp; <img id="sacolaDeCompras" src="img/icons8-ingredientes-48.png" alt=""></h4>


        <div class="container" id="tabelaAlimentos">

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-info btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Cereais
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">

                            <?php
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3`, `col 5`,`col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos WHERE (`ID` >= 2 AND `ID` <= 25 )";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col"><img src="img/icons8-saco-de-farinha-48.png" alt=""><img src="img/icons8-espaguete-48.png" alt=""><img src="img/icons8-milho-48.png" alt=""></th>

                                    <th scope="col">Medida caseira</th>
                                    <th scope="col">Gramas</th>
                                    <th scope="col">CHO</th>
                                    <th scope="col">PTN</th>
                                    <th scope="col">LIP</th>
                                    <th scope="col">KCAL</th>
                                </tr>



                                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
                         ?>
                                <td style="text-align: center;">
                                    <?php echo $row["col 5"]."</td>";
                        echo "<td>".$row["col 6"]."</td>";
                        echo "<td>".$row["col 7"]."</td>"; 
                        echo "<td>".$row["col 8"]."</td>"; 
                        echo "<td>".$row["col 9"]."</td>"; 
                        echo "</tr>";
                    } ?>
                            </table>
                            <?php } 
                else
                {
                    ?>
                            <div id="msgErro" class="alert alert-danger" role="alert">
                                Nenhum registro encontrado
                            </div>
                            <?php  
                }
            
        ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-warning btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Pães, Biscoito
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">

                            <?php
                
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3`, `col 5`,`col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos WHERE (`ID` >= 27 AND `ID` <= 46)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col"><img src="img/icons8-p%C3%A3o-48.png" alt=""><img src="img/icons8-biscoito-48.png" alt=""><img src="img/icons8-bolo-48.png" alt=""></th>

                                    <th scope="col">Medida caseira</th>
                                    <th scope="col">Gramas</th>
                                    <th scope="col">CHO</th>
                                    <th scope="col">PTN</th>
                                    <th scope="col">LIP</th>
                                    <th scope="col">KCAL</th>
                                </tr>



                                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
                         ?>
                                <td style="text-align: center;">
                                    <?php echo $row["col 5"]."</td>";
                        echo "<td>".$row["col 6"]."</td>";
                        echo "<td>".$row["col 7"]."</td>"; 
                        echo "<td>".$row["col 8"]."</td>"; 
                        echo "<td>".$row["col 9"]."</td>"; 
                        echo "</tr>";
                    } ?>
                            </table>
                            <?php } 
                else
                {
                    ?>
                            <div id="msgErro" class="alert alert-danger" role="alert">
                                Nenhum registro encontrado
                            </div>
                            <?php  
                }
            
        ?>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-success btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Verdura, hortaliça e deriv,
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">

                            <?php
                
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3`, `col 5`,`col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos WHERE (`ID` >= 48 AND `ID` <= 92)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col"><img src="img/icons8-couve-flor-48.png" alt=""><img src="img/icons8-cenoura-48.png" alt=""><img src="img/icons8-tomate-48.png" alt=""><img src="img/icons8-alface-48.png" alt=""><img src="img/icons8-cebola-48.png" alt=""></th>

                                    <th scope="col">Medida caseira</th>
                                    <th scope="col">Gramas</th>
                                    <th scope="col">CHO</th>
                                    <th scope="col">PTN</th>
                                    <th scope="col">LIP</th>
                                    <th scope="col">KCAL</th>
                                </tr>



                                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
                         ?>
                                <td style="text-align: center;">
                                    <?php echo $row["col 5"]."</td>";
                        echo "<td>".$row["col 6"]."</td>";
                        echo "<td>".$row["col 7"]."</td>"; 
                        echo "<td>".$row["col 8"]."</td>"; 
                        echo "<td>".$row["col 9"]."</td>"; 
                        echo "</tr>";
                    } ?>
                            </table>
                            <?php } 
                else
                {
                    ?>
                            <div id="msgErro" class="alert alert-danger" role="alert">
                                Nenhum registro encontrado
                            </div>
                            <?php  
                }
            
        ?>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h2 class="mb-0">
                            <button class="btn btn-danger btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Frutas e derivados
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">

                            <?php
                
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3`, `col 5`,`col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos WHERE (`ID` >= 94 AND `ID` <= 136)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col"><img src="img/icons8-melancia-48.png" alt=""><img src="img/icons8-banana-48.png" alt=""> <img src="img/icons8-kiwi-48.png" alt=""><img src="img/icons8-mam%C3%A3o-48.png" alt=""><img src="img/icons8-morango-48.png" alt=""><img src="img/icons8-abacate-48.png" alt=""></th>

                                    <th scope="col">Medida caseira</th>
                                    <th scope="col">Gramas</th>
                                    <th scope="col">CHO</th>
                                    <th scope="col">PTN</th>
                                    <th scope="col">LIP</th>
                                    <th scope="col">KCAL</th>
                                </tr>



                                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
                         ?>
                                <td style="text-align: center;">
                                    <?php echo $row["col 5"]."</td>";
                        echo "<td>".$row["col 6"]."</td>";
                        echo "<td>".$row["col 7"]."</td>"; 
                        echo "<td>".$row["col 8"]."</td>"; 
                        echo "<td>".$row["col 9"]."</td>"; 
                        echo "</tr>";
                    } ?>
                            </table>
                            <?php } 
                else
                {
                    ?>
                            <div id="msgErro" class="alert alert-danger" role="alert">
                                Nenhum registro encontrado
                            </div>
                            <?php  
                }
            
        ?>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h2 class="mb-0">
                            <button class="btn btn-secondary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Gorduras e óleos
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                        <div class="card-body">

                            <?php
                
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3`, `col 5`,`col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos WHERE (`ID` >= 138 AND `ID` <= 142)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col"><img src="img/icons8-azeite-48.png" alt=""></th>

                                    <th scope="col">Medida caseira</th>
                                    <th scope="col">Gramas</th>
                                    <th scope="col">CHO</th>
                                    <th scope="col">PTN</th>
                                    <th scope="col">LIP</th>
                                    <th scope="col">KCAL</th>
                                </tr>



                                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
                         ?>
                                <td style="text-align: center;">
                                    <?php echo $row["col 5"]."</td>";
                        echo "<td>".$row["col 6"]."</td>";
                        echo "<td>".$row["col 7"]."</td>"; 
                        echo "<td>".$row["col 8"]."</td>"; 
                        echo "<td>".$row["col 9"]."</td>"; 
                        echo "</tr>";
                    } ?>
                            </table>
                            <?php } 
                else
                {
                    ?>
                            <div id="msgErro" class="alert alert-danger" role="alert">
                                Nenhum registro encontrado
                            </div>
                            <?php  
                }
            
        ?>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingSix">
                        <h2 class="mb-0">
                            <button class="btn btn-primary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Pescados e frutos do mar
                            </button>
                        </h2>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                        <div class="card-body">

                            <?php
                
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3`, `col 5`,`col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos WHERE (`ID` >= 144 AND `ID` <= 156)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col"><img src="img/icons8-peixe-48.png" alt=""> <img src="img/icons8-sashimi-48.png" alt=""><img id="peixePalhaco" src="img/icons8-peixe-palha%C3%A7o-48.png" alt=""></th>

                                    <th scope="col">Medida caseira</th>
                                    <th scope="col">Gramas</th>
                                    <th scope="col">CHO</th>
                                    <th scope="col">PTN</th>
                                    <th scope="col">LIP</th>
                                    <th scope="col">KCAL</th>
                                </tr>



                                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
                         ?>
                                <td style="text-align: center;">
                                    <?php echo $row["col 5"]."</td>";
                        echo "<td>".$row["col 6"]."</td>";
                        echo "<td>".$row["col 7"]."</td>"; 
                        echo "<td>".$row["col 8"]."</td>"; 
                        echo "<td>".$row["col 9"]."</td>"; 
                        echo "</tr>";
                    } ?>
                            </table>
                            <?php } 
                else
                {
                    ?>
                            <div id="msgErro" class="alert alert-danger" role="alert">
                                Nenhum registro encontrado
                            </div>
                            <?php  
                }
            
        ?>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingSeven">
                        <h2 class="mb-0">
                            <button class="btn btn-danger btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Carnes e derivados
                            </button>
                        </h2>
                    </div>
                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                        <div class="card-body">

                            <?php
                
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3`, `col 5`,`col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos WHERE (`ID` >= 158 AND `ID` <= 178)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col"><img src="img/icons8-bife-48.png" alt=""><img src="img/icons8-salsichas-48.png" alt=""><img src="img/icons8-a%C3%A7%C3%A3o-de-gra%C3%A7as-48.png" alt=""><img src="img/icons8-bacon-48.png" alt=""><img src="img/icons8-presunto-48.png" alt=""></th>

                                    <th scope="col">Medida caseira</th>
                                    <th scope="col">Gramas</th>
                                    <th scope="col">CHO</th>
                                    <th scope="col">PTN</th>
                                    <th scope="col">LIP</th>
                                    <th scope="col">KCAL</th>
                                </tr>



                                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
                         ?>
                                <td style="text-align: center;">
                                    <?php echo $row["col 5"]."</td>";
                        echo "<td>".$row["col 6"]."</td>";
                        echo "<td>".$row["col 7"]."</td>"; 
                        echo "<td>".$row["col 8"]."</td>"; 
                        echo "<td>".$row["col 9"]."</td>"; 
                        echo "</tr>";
                    } ?>
                            </table>
                            <?php } 
                else
                {
                    ?>
                            <div id="msgErro" class="alert alert-danger" role="alert">
                                Nenhum registro encontrado
                            </div>
                            <?php  
                }
            
        ?>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingEight">
                        <h2 class="mb-0">
                            <button class="btn btn-info btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                Leite e derivados
                            </button>
                        </h2>
                    </div>
                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                        <div class="card-body">

                            <?php
                
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3`, `col 5`,`col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos WHERE (`ID` >= 180 AND `ID` <= 198)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col"><img src="img/icons8-garrafa-de-leite-48.png" alt=""> <img src="img/icons8-queijo-48.png" alt=""><img src="img/icons8-iogurte-48.png" alt=""></th>

                                    <th scope="col">Medida caseira</th>
                                    <th scope="col">Gramas</th>
                                    <th scope="col">CHO</th>
                                    <th scope="col">PTN</th>
                                    <th scope="col">LIP</th>
                                    <th scope="col">KCAL</th>
                                </tr>



                                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
                         ?>
                                <td style="text-align: center;">
                                    <?php echo $row["col 5"]."</td>";
                        echo "<td>".$row["col 6"]."</td>";
                        echo "<td>".$row["col 7"]."</td>"; 
                        echo "<td>".$row["col 8"]."</td>"; 
                        echo "<td>".$row["col 9"]."</td>"; 
                        echo "</tr>";
                    } ?>
                            </table>
                            <?php } 
                else
                {
                    ?>
                            <div id="msgErro" class="alert alert-danger" role="alert">
                                Nenhum registro encontrado
                            </div>
                            <?php  
                }
            
        ?>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingNine">
                        <h2 class="mb-0">
                            <button class="btn btn-dark btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                Bebidas
                            </button>
                        </h2>
                    </div>
                    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                        <div class="card-body">

                            <?php
                
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3`, `col 5`,`col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos WHERE (`ID` >= 200 AND `ID` <= 208)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col"><img src="img/icons8-caf%C3%A9-48.png" alt=""><img src="img/icons8-cerveja-48.png" alt=""><img src="img/icons8-coco-48.png" alt=""></th>

                                    <th scope="col">Medida caseira</th>
                                    <th scope="col">Gramas</th>
                                    <th scope="col">CHO</th>
                                    <th scope="col">PTN</th>
                                    <th scope="col">LIP</th>
                                    <th scope="col">KCAL</th>
                                </tr>



                                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
                         ?>
                                <td style="text-align: center;">
                                    <?php echo $row["col 5"]."</td>";
                        echo "<td>".$row["col 6"]."</td>";
                        echo "<td>".$row["col 7"]."</td>"; 
                        echo "<td>".$row["col 8"]."</td>"; 
                        echo "<td>".$row["col 9"]."</td>"; 
                        echo "</tr>";
                    } ?>
                            </table>
                            <?php } 
                else
                {
                    ?>
                            <div id="msgErro" class="alert alert-danger" role="alert">
                                Nenhum registro encontrado
                            </div>
                            <?php  
                }
            
        ?>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTen">
                        <h2 class="mb-0">
                            <button class="btn btn-warning btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                Ovos e derivados
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                        <div class="card-body">

                            <?php
                
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3`, `col 5`,`col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos WHERE (`ID` >= 210 AND `ID` <= 213)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col"><img src="img/icons8-ovos-fritos-64.png" alt=""><img src="img/icons8-ovos1-48.png" alt=""></th>

                                    <th scope="col">Medida caseira</th>
                                    <th scope="col">Gramas</th>
                                    <th scope="col">CHO</th>
                                    <th scope="col">PTN</th>
                                    <th scope="col">LIP</th>
                                    <th scope="col">KCAL</th>
                                </tr>



                                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
                         ?>
                                <td style="text-align: center;">
                                    <?php echo $row["col 5"]."</td>";
                        echo "<td>".$row["col 6"]."</td>";
                        echo "<td>".$row["col 7"]."</td>"; 
                        echo "<td>".$row["col 8"]."</td>"; 
                        echo "<td>".$row["col 9"]."</td>"; 
                        echo "</tr>";
                    } ?>
                            </table>
                            <?php } 
                else
                {
                    ?>
                            <div id="msgErro" class="alert alert-danger" role="alert">
                                Nenhum registro encontrado
                            </div>
                            <?php  
                }
            
        ?>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingEleven">
                        <h2 class="mb-0">
                            <button class="btn btn-secondary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                Produtos açucarados
                            </button>
                        </h2>
                    </div>
                    <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionExample">
                        <div class="card-body">

                            <?php
                
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3`, `col 5`,`col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos WHERE (`ID` >= 215 AND `ID` <= 224)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col"><img src="img/icons8-barra-de-chocolate-48.png" alt=""><img src="img/icons8-gel%C3%A9ia-48.png" alt=""><img src="img/icons8-mel-48.png" alt=""></th>

                                    <th scope="col">Medida caseira</th>
                                    <th scope="col">Gramas</th>
                                    <th scope="col">CHO</th>
                                    <th scope="col">PTN</th>
                                    <th scope="col">LIP</th>
                                    <th scope="col">KCAL</th>
                                </tr>



                                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
                         ?>
                                <td style="text-align: center;">
                                    <?php echo $row["col 5"]."</td>";
                        echo "<td>".$row["col 6"]."</td>";
                        echo "<td>".$row["col 7"]."</td>"; 
                        echo "<td>".$row["col 8"]."</td>"; 
                        echo "<td>".$row["col 9"]."</td>"; 
                        echo "</tr>";
                    } ?>
                            </table>
                            <?php } 
                else
                {
                    ?>
                            <div id="msgErro" class="alert alert-danger" role="alert">
                                Nenhum registro encontrado
                            </div>
                            <?php  
                }
            
        ?>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwelve">
                        <h2 class="mb-0">
                            <button class="btn btn-info btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                Miscelâneas
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordionExample">
                        <div class="card-body">

                            <?php
                
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3`, `col 5`,`col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos WHERE (`ID` >= 226 AND `ID` <= 231)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col"><img src="img/icons8-gelatina-48.png" alt=""><img src="img/icons8-saleiro-48.png" alt=""></th>

                                    <th scope="col">Medida caseira</th>
                                    <th scope="col">Gramas</th>
                                    <th scope="col">CHO</th>
                                    <th scope="col">PTN</th>
                                    <th scope="col">LIP</th>
                                    <th scope="col">KCAL</th>
                                </tr>



                                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
                         ?>
                                <td style="text-align: center;">
                                    <?php echo $row["col 5"]."</td>";
                        echo "<td>".$row["col 6"]."</td>";
                        echo "<td>".$row["col 7"]."</td>"; 
                        echo "<td>".$row["col 8"]."</td>"; 
                        echo "<td>".$row["col 9"]."</td>"; 
                        echo "</tr>";
                    } ?>
                            </table>
                            <?php } 
                else
                {
                    ?>
                            <div id="msgErro" class="alert alert-danger" role="alert">
                                Nenhum registro encontrado
                            </div>
                            <?php  
                }
            
        ?>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThirteen">
                        <h2 class="mb-0">
                            <button class="btn btn-danger btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                                Outros alimentos ind,
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen" data-parent="#accordionExample">
                        <div class="card-body">

                            <?php
                
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3`, `col 5`,`col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos WHERE (`ID` >= 233 AND `ID` <= 237)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col"><img src="img/icons8-azeitona-48.png" alt=""></th>

                                    <th scope="col">Medida caseira</th>
                                    <th scope="col">Gramas</th>
                                    <th scope="col">CHO</th>
                                    <th scope="col">PTN</th>
                                    <th scope="col">LIP</th>
                                    <th scope="col">KCAL</th>
                                </tr>



                                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
                         ?>
                                <td style="text-align: center;">
                                    <?php echo $row["col 5"]."</td>";
                        echo "<td>".$row["col 6"]."</td>";
                        echo "<td>".$row["col 7"]."</td>"; 
                        echo "<td>".$row["col 8"]."</td>"; 
                        echo "<td>".$row["col 9"]."</td>"; 
                        echo "</tr>";
                    } ?>
                            </table>
                            <?php } 
                else
                {
                    ?>
                            <div id="msgErro" class="alert alert-danger" role="alert">
                                Nenhum registro encontrado
                            </div>
                            <?php  
                }
            
        ?>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFourteen">
                        <h2 class="mb-0">
                            <button class="btn btn-success btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                                Alimentos preparados
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen" data-parent="#accordionExample">
                        <div class="card-body">

                            <?php
                
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3`, `col 5`,`col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos WHERE (`ID` >= 239 AND `ID` <= 241)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col"><img src="img/icons8-tigela-de-arroz-48.png" alt=""></th>

                                    <th scope="col">Medida caseira</th>
                                    <th scope="col">Gramas</th>
                                    <th scope="col">CHO</th>
                                    <th scope="col">PTN</th>
                                    <th scope="col">LIP</th>
                                    <th scope="col">KCAL</th>
                                </tr>



                                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
                         ?>
                                <td style="text-align: center;">
                                    <?php echo $row["col 5"]."</td>";
                        echo "<td>".$row["col 6"]."</td>";
                        echo "<td>".$row["col 7"]."</td>"; 
                        echo "<td>".$row["col 8"]."</td>"; 
                        echo "<td>".$row["col 9"]."</td>"; 
                        echo "</tr>";
                    } ?>
                            </table>
                            <?php } 
                else
                {
                    ?>
                            <div id="msgErro" class="alert alert-danger" role="alert">
                                Nenhum registro encontrado
                            </div>
                            <?php  
                }
            
        ?>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFifteen">
                        <h2 class="mb-0">
                            <button class="btn btn-dark btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen">
                                Leguminosas e derivados
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFifteen" class="collapse" aria-labelledby="headingFifteen" data-parent="#accordionExample">
                        <div class="card-body">

                            <?php
                
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3`, `col 5`,`col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos WHERE (`ID` >= 243 AND `ID` <= 248)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col"><img src="img/icons8-ervilhas-48.png" alt=""><img src="img/icons8-saco-de-papel-com-sementes-48.png" alt=""></th>

                                    <th scope="col">Medida caseira</th>
                                    <th scope="col">Gramas</th>
                                    <th scope="col">CHO</th>
                                    <th scope="col">PTN</th>
                                    <th scope="col">LIP</th>
                                    <th scope="col">KCAL</th>
                                </tr>



                                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
                         ?>
                                <td style="text-align: center;">
                                    <?php echo $row["col 5"]."</td>";
                        echo "<td>".$row["col 6"]."</td>";
                        echo "<td>".$row["col 7"]."</td>"; 
                        echo "<td>".$row["col 8"]."</td>"; 
                        echo "<td>".$row["col 9"]."</td>"; 
                        echo "</tr>";
                    } ?>
                            </table>
                            <?php } 
                else
                {
                    ?>
                            <div id="msgErro" class="alert alert-danger" role="alert">
                                Nenhum registro encontrado
                            </div>
                            <?php  
                }
            
        ?>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingSixteen">
                        <h2 class="mb-0">
                            <button class="btn btn-primary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseSixteen" aria-expanded="false" aria-controls="collapseSixteen">
                                Nozes e Sementes
                            </button>
                        </h2>
                    </div>
                    <div id="collapseSixteen" class="collapse" aria-labelledby="headingSixteen" data-parent="#accordionExample">
                        <div class="card-body">

                            <?php
                
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3`, `col 5`,`col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos WHERE (`ID` >= 250 AND `ID` <= 255)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col"><img src="img/icons8-noz-48.png" alt=""><img src="img/icons8-noz-do-brasil-48.png" alt=""></th>

                                    <th scope="col">Medida caseira</th>
                                    <th scope="col">Gramas</th>
                                    <th scope="col">CHO</th>
                                    <th scope="col">PTN</th>
                                    <th scope="col">LIP</th>
                                    <th scope="col">KCAL</th>
                                </tr>



                                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
                         ?>
                                <td style="text-align: center;">
                                    <?php echo $row["col 5"]."</td>";
                        echo "<td>".$row["col 6"]."</td>";
                        echo "<td>".$row["col 7"]."</td>"; 
                        echo "<td>".$row["col 8"]."</td>"; 
                        echo "<td>".$row["col 9"]."</td>"; 
                        echo "</tr>";
                    } ?>
                            </table>
                            <?php } 
                else
                {
                    ?>
                            <div id="msgErro" class="alert alert-danger" role="alert">
                                Nenhum registro encontrado
                            </div>
                            <?php  
                }
            
        ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>



        <footer class="container" id="rodape">
            <?php include_once 'rodape.php'; ?>
        </footer>
    </div>

</body>

</html>
