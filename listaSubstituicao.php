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
            <a id="menuAberto" href="nutricionistaMenu.php" class="list-group-item list-group-item-action">Dados do paciente<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Av. Antropométrica<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Av. Bioquímica<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Av. Clínica nutri.<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Vet FAO<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuAberto" id="menuFechado" href="tabelaAlimentos.php" class="list-group-item list-group-item-action">Lista de alimentos<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
            <a id="menuAberto" href="receituario.php" class="list-group-item list-group-item-action">Receituário <i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Dietoterapia<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a href="listaSubstituicao.php" class="list-group-item list-group-item-action">Lista de subs.<i class="fas fa-check" style="font-size: 17px; color: #3b884d"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Impressão de dieta<i class="fas fa-lock" id="cadeadoFechado"></i></a>
        </div>






        <h4 id="menuNutricionista3">Lista de Substituição&nbsp; <img id="sacolaDeCompras" src="img/icons8-setas-esquerda-e-direita-48.png" alt="">

            <!-- card de impressao para imprimir -->
            <div id="substituicaoImpressao">
                <div class="accordion">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0" id="textoImprimir">Imprimir</h5>
                        </div>
                        <div id="divDoBotao1">
                            <img class="impressoraImagem animated pulse" onclick="print()" src="img/icons8-m%C3%A1quina-de-escrever-com-tablet-48.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </h4>


        <br><br><br><br>

        <div id="tabelaAlimentos2">

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 id="listaSubTitulo" class="mb-0">
                            Cereais <img src="img/icons8-saco-de-farinha-48.png" alt=""><img src="img/icons8-espaguete-48.png" alt=""><img src="img/icons8-milho-48.png" alt="">
                        </h2>
                    </div>

                    <div class="card-body">

                        <?php
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`ID` >= 2 AND `ID` <= 25)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Alimento</th>
                                <th scope="col">Medida caseira</th>
                            </tr>



                            <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
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

        <div id="tabelaAlimentos2">

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 id="listaSubTitulo" class="mb-0">
                            Pães, Biscoito<img src="img/icons8-p%C3%A3o-48.png" alt=""><img src="img/icons8-biscoito-48.png" alt=""><img src="img/icons8-bolo-48.png" alt="">
                        </h2>
                    </div>

                    <div class="card-body">

                        <?php
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`ID` >= 27 AND `ID` <= 46)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Alimento</th>
                                <th scope="col">Medida caseira</th>
                            </tr>



                            <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
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

        <div id="tabelaAlimentos2">

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 id="listaSubTitulo" class="mb-0">
                            Gorduras e óleos<img src="img/icons8-azeite-48.png" alt="">
                        </h2>
                    </div>

                    <div class="card-body">

                        <?php
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`ID` >= 138 AND `ID` <= 142)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Alimento</th>
                                <th scope="col">Medida caseira</th>
                            </tr>



                            <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
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

        <div id="limpandoTelaParaDieta">
            <p></p>
        </div>


        <div id="tabelaAlimentos1">

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 id="listaSubTitulo" class="mb-0">
                            Verdura, hortaliça e deriv, <img src="img/icons8-couve-flor-48.png" alt=""><img src="img/icons8-cenoura-48.png" alt=""><img src="img/icons8-tomate-48.png" alt=""><img src="img/icons8-alface-48.png" alt=""><img src="img/icons8-cebola-48.png" alt="">
                        </h2>
                    </div>

                    <div class="card-body">

                        <?php
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`ID` >= 48 AND `ID` <= 92)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Alimento</th>
                                <th scope="col">Medida caseira</th>
                            </tr>



                            <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
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

        <div id="tabelaAlimentos2">

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 id="listaSubTitulo" class="mb-0">
                            Frutas e derivados<img src="img/icons8-melancia-48.png" alt=""><img src="img/icons8-banana-48.png" alt=""> <img src="img/icons8-kiwi-48.png" alt=""><img src="img/icons8-mam%C3%A3o-48.png" alt=""><img src="img/icons8-morango-48.png" alt=""><img src="img/icons8-abacate-48.png" alt="">
                        </h2>
                    </div>

                    <div class="card-body">

                        <?php
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`ID` >= 93 AND `ID` <= 136)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Alimento</th>
                                <th scope="col">Medida caseira</th>
                            </tr>



                            <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
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

        <div id="limpandoTelaParaDieta">
            <p></p>
        </div>

        <div id="tabelaAlimentos1">

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 id="listaSubTitulo" class="mb-0">
                            Pescados e frutos do mar<img src="img/icons8-peixe-48.png" alt=""> <img src="img/icons8-sashimi-48.png" alt=""><img id="peixePalhaco" src="img/icons8-peixe-palha%C3%A7o-48.png" alt="">
                        </h2>
                    </div>

                    <div class="card-body">

                        <?php
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`ID` >= 144 AND `ID` <= 156)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Alimento</th>
                                <th scope="col">Medida caseira</th>
                            </tr>



                            <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
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

        <div id="tabelaAlimentos2">

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 id="listaSubTitulo" class="mb-0">
                            Carnes e derivados<img src="img/icons8-bife-48.png" alt=""><img src="img/icons8-salsichas-48.png" alt=""><img src="img/icons8-a%C3%A7%C3%A3o-de-gra%C3%A7as-48.png" alt=""><img src="img/icons8-bacon-48.png" alt=""><img src="img/icons8-presunto-48.png" alt="">
                        </h2>
                    </div>

                    <div class="card-body">

                        <?php
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`ID` >= 158 AND `ID` <= 178)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Alimento</th>
                                <th scope="col">Medida caseira</th>
                            </tr>



                            <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
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

        <div id="tabelaAlimentos1">

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 id="listaSubTitulo" class="mb-0">
                            Ovos e derivado<img src="img/icons8-ovos-fritos-64.png" alt=""><img src="img/icons8-ovos1-48.png" alt="">
                        </h2>
                    </div>

                    <div class="card-body">

                        <?php
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`ID` >= 210 AND `ID` <= 213)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Alimento</th>
                                <th scope="col">Medida caseira</th>
                            </tr>



                            <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
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

        <div id="limpandoTelaParaDieta">
            <p></p>
        </div>

        <div id="tabelaAlimentos1">

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 id="listaSubTitulo" class="mb-0">
                            Leite e derivados<img src="img/icons8-garrafa-de-leite-48.png" alt=""> <img src="img/icons8-queijo-48.png" alt=""><img src="img/icons8-iogurte-48.png" alt="">
                        </h2>
                    </div>

                    <div class="card-body">

                        <?php
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`ID` >= 180 AND `ID` <= 198)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Alimento</th>
                                <th scope="col">Medida caseira</th>
                            </tr>



                            <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
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

        <div id="tabelaAlimentos2">

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 id="listaSubTitulo" class="mb-0">
                            Bebidas<img src="img/icons8-caf%C3%A9-48.png" alt=""><img src="img/icons8-cerveja-48.png" alt=""><img src="img/icons8-coco-48.png" alt="">
                        </h2>
                    </div>

                    <div class="card-body">

                        <?php
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`ID` >= 200 AND `ID` <= 208)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Alimento</th>
                                <th scope="col">Medida caseira</th>
                            </tr>



                            <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
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

        <div id="tabelaAlimentos2">

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 id="listaSubTitulo" class="mb-0">
                            Miscelâneas<img src="img/icons8-gelatina-48.png" alt=""><img src="img/icons8-saleiro-48.png" alt="">
                        </h2>
                    </div>

                    <div class="card-body">

                        <?php
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`ID` >= 226 AND `ID` <= 231)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Alimento</th>
                                <th scope="col">Medida caseira</th>
                            </tr>



                            <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
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

        <div id="limpandoTelaParaDieta">
            <p></p>
        </div>

        <div id="tabelaAlimentos1">

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 id="listaSubTitulo" class="mb-0">
                            Produtos açucarados<img src="img/icons8-barra-de-chocolate-48.png" alt=""><img src="img/icons8-gel%C3%A9ia-48.png" alt=""><img src="img/icons8-mel-48.png" alt="">
                        </h2>
                    </div>

                    <div class="card-body">

                        <?php
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`ID` >= 215 AND `ID` <= 224)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Alimento</th>
                                <th scope="col">Medida caseira</th>
                            </tr>



                            <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
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

        <div id="tabelaAlimentos2">

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 id="listaSubTitulo" class="mb-0">
                            Outros alimentos ind,<img src="img/icons8-azeitona-48.png" alt="">
                        </h2>
                    </div>

                    <div class="card-body">

                        <?php
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`ID` >= 233 AND `ID` <= 237)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Alimento</th>
                                <th scope="col">Medida caseira</th>
                            </tr>



                            <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
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

        <div id="tabelaAlimentos2">

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 id="listaSubTitulo" class="mb-0">
                            Leguminosas e derivados<img src="img/icons8-ervilhas-48.png" alt=""><img src="img/icons8-saco-de-papel-com-sementes-48.png" alt="">
                        </h2>
                    </div>

                    <div class="card-body">

                        <?php
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`ID` >= 243 AND `ID` <= 248)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Alimento</th>
                                <th scope="col">Medida caseira</th>
                            </tr>



                            <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
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

        <div id="tabelaAlimentos1">

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 id="listaSubTitulo" class="mb-0">
                            Alimentos preparados<img src="img/icons8-tigela-de-arroz-48.png" alt="">
                        </h2>
                    </div>

                    <div class="card-body">

                        <?php
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`ID` >= 239 AND `ID` <= 241)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Alimento</th>
                                <th scope="col">Medida caseira</th>
                            </tr>



                            <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
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



        <div id="tabelaAlimentos1">

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 id="listaSubTitulo" class="mb-0">
                            Nozes e Sementes<img src="img/icons8-noz-48.png" alt=""><img src="img/icons8-noz-do-brasil-48.png" alt="">
                        </h2>
                    </div>

                    <div class="card-body">

                        <?php
            
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`ID` >= 250 AND `ID` <= 255)";
                
                $result = mysqli_query($con, $sql);
                
                
                if($result)
                { ?>
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Alimento</th>
                                <th scope="col">Medida caseira</th>
                            </tr>



                            <?php
                    while($row = mysqli_fetch_assoc($result))
                    {  
                        echo "<tr>"; 
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
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

        <footer class="container" id="rodape">
            <?php include_once 'rodape.php'; ?>
        </footer>
    </div>

</body>

</html>
