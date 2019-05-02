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
            <a href="nutricionistaMenu.php" class="list-group-item list-group-item-action">Dados do paciente</a>
            <a href="form-antropometria.php" class="list-group-item list-group-item-action">Av. Antropométrica</a>
            <a href="form-bioquiomica.php" class="list-group-item list-group-item-action">Av. Bioquímica</a>
            <a href="form-clinicaNutricional.php" class="list-group-item list-group-item-action">Av. Clínica nutri.</a>
            <a href="form-VetFao.php" class="list-group-item list-group-item-action">Vet FAO</a>
            <a href="tabelaAlimentos.php" class="list-group-item list-group-item-action">Lista de alimentos</a>
            <a href="#" class="list-group-item list-group-item-action">Recordatório 24h</a>
            <a href="form-Dietoterapia.php" class="list-group-item list-group-item-action">Dietoterapia</a>
            <a href="listaSubstituicao.php" class="list-group-item list-group-item-action">Lista de subs.<i class="fas fa-check" style="font-size: 10px; color: #3b884d"></i></a>
            <a href="impressaoDieta.php" class="list-group-item list-group-item-action">Impressão de dieta</a>
        </div>

        <h4 id="menuNutricionista">Lista de Substituição&nbsp; <img id="sacolaDeCompras" src="img/icons8-setas-esquerda-e-direita-48.png" alt=""></h4>


        <div id="tabelaAlimentos0">

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
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`col 1` >= 1 AND `col 1` <= 20)";
                
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
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`col 1` >= 21 AND `col 1` <= 38)";
                
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
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`col 1` >= 126 AND `col 1` <= 130)";
                
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
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`col 1` >= 39 AND `col 1` <= 82)";
                
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
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`col 1` >= 83 AND `col 1` <= 125)";
                
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
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`col 1` >= 131 AND `col 1` <= 143)";
                
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
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`col 1` >= 144 AND `col 1` <= 164)";
                
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
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`col 1` >= 188 AND `col 1` <= 191)";
                
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
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`col 1` >= 165 AND `col 1` <= 178)";
                
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
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`col 1` >= 179 AND `col 1` <= 187)";
                
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
                
                $sql = "SELECT `col 2`, `col 3`, `col 5`,`col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos WHERE (`col 1` >= 202 AND `col 1` <= 207)";
                
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
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`col 1` >= 192 AND `col 1` <= 201)";
                
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
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`col 1` >= 208 AND `col 1` <= 215)";
                
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
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`col 1` >= 217 AND `col 1` <= 222)";
                
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
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`col 1` >= 213 AND `col 1` <= 215)";
                
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
                
                $sql = "SELECT `col 2`, `col 3` from tabelaalimentos WHERE (`col 1` >= 223 AND `col 1` <= 228)";
                
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
