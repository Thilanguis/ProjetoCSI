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
            <a id="menuAberto" href="tabelaAlimentos.php" class="list-group-item list-group-item-action">Lista de alimentos<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action">Receituário <i class="fas fa-check" style="font-size: 17px; color: #3b884d"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Dietoterapia<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuAberto" href="listaSubstituicao.php" class="list-group-item list-group-item-action">Lista de subs. <i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" title="Inicie uma consulta para acessar os formulários com cadeado">Impressão de dieta<i class="fas fa-lock" id="cadeadoFechado"></i></a>
        </div>






        <h4 id="menuNutricionista4">Receituário&nbsp; <img id="sacolaDeCompras" src="img/icons8-setas-esquerda-e-direita-48.png" alt="">

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

        <div style="display: inline-block; margin-left: 30px; float: left;">
            <img id="brasaoNutricao3" src="img/nutricao-falculdade-universidade-plotter-recorte-logo-1F9AF53657-seeklogo.com.png" alt="">
        </div>
        <h2 id="nutricionistaLogado" type=""> <?php echo $_SESSION["login"];  ?></h2>
        <h4 style="text-align: center; margin-right: 165px;">Nutricionista</h4>
        <h6 id="crnReceituario" style="text-align: center; margin-right: 32px;"><?php echo"CRN ". $_SESSION["crn"];  ?></h6>

        <div class="form-group" style="float: right; width: 900px;">
            <textarea class="form-control col-11" id="exampleFormControlTextarea1" rows="20"></textarea>
        </div>

        <footer class="container" id="rodape">
            <?php include_once 'rodape.php'; ?>
        </footer>
    </div>

</body>

</html>
