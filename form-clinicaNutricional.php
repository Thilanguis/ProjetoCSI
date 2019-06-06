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

            <!-- Nome do paciente em consulta! -->
            <div>
                <?php
                
                include_once 'conexao.php';
                
                $sql = "select nome from cliente where id_cliente =".$_GET["id_cliente"];
                
                $result = mysqli_query ($con, $sql);
                
                $row = mysqli_fetch_array($result);
                
                echo "<h6 id='divTotalPaciente'><b><img id='hipertensao' src='img/icons8-hipertens%C3%A3o-64.png' alt=''>Paciente em consulta:</b></h6>"; echo "<div id='paciente'>" .$row[0]."</div>";
                ?>

                <!-- script terminar dieta do paciente  -->
                <script>
                    function terminarDieta() {

                        var nomePaciente = "<?php echo $row[0]; ?>"

                        if (confirm('Realmente deseja encerrar a dieta do Paciente ' + nomePaciente + "?")) {
                            location.href = 'nutricionistaMenu.php';
                        }
                    }

                </script>
            </div>


            <div> <i id="usuarioLogado" class="fas fa-user-check"></i> <b>Bem-vindo Nutricionista:</b>
                <?php echo "<i id='paciente'>"  .$_SESSION["login"] . "</i>" ; ?> <a style="text-decoration: none;" href="#" onclick="deslogar();">&nbsp;<img id="logout" src="img/icons8-exit-48.png" alt=""></a>
            </div>
        </nav>

        <div id="listNutri" class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
                Menu
            </a>
            <a id="menuAlerta" href="#" class="list-group-item list-group-item-action" onclick="terminarDieta()">Encerrar dieta <img id="cancelarDieta" src="img/icons8-cancelar-48.png" alt=""></a>
            <a href="#" class="list-group-item list-group-item-action" style="background-color: rgba(134, 214, 143, 0.72);">Av. Antropométrica</a>
            <a href="#" class="list-group-item list-group-item-action" style="background-color: rgba(134, 214, 143, 0.72);">Av. Bioquímica</a>
            <a href="#" class="list-group-item list-group-item-action">Av. Clínica nutri. <i class="fas fa-check" style="font-size: 16px; color: #3b884d"></i> </a>
            <a id="menuAberto" href="#" class="list-group-item list-group-item-action" onclick="avisoAvancar()">Vet FAO<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" onclick="avisoNaoPodeAcessar()">Lista de alimentos<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" onclick="avisoNaoPodeAcessar()">Receituário <i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuAberto" href="#" class="list-group-item list-group-item-action" onclick="avisoAvancar()">Dietoterapia<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" onclick="avisoNaoPodeAcessar()">Lista de subs.<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuAberto" href="#" class="list-group-item list-group-item-action" onclick="avisoAvancar()">Impressão de dieta<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
        </div>

        <h4 id="menuNutricionista">Avaliação Clínica Nutricional &nbsp; <i class="fas fa-book-medical" style="font-size: 40px; color: #d83838; text-shadow: none;"></i></h4>


        <div id="form-Clinico">
            <form action="cadastroClinicaNutricional.php" method="post">

                <!-- passando id do paciente -->
                <input type="hidden" name="id_cliente" value="<?php echo $_GET["id_cliente"] ?>">

                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h6><i>H. Patológica pregressa :</i></h6>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputPassword" placeholder="" name="HpatologiaPregressa">
                    </div>
                    <img id="virus" src="img/icons8-v%C3%ADrus-48.png" alt="">
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h6><i>Histórico familiar :</i></h6>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputPassword" placeholder="" name="Hfamiliar">
                    </div>
                    <img id="familia" src="img/icons8-fam%C3%ADlia-homem-mulher-48.png" alt="">
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h6><i>Histórico alimentar :</i></h6>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputPassword" placeholder="" name="Halimentar" ;>
                    </div>
                    <img id="maca" src="img/icons8-ma%C3%A7%C3%A3-48.png" alt="">
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h6><i>Sinal clínico :</i></h6>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputPassword" placeholder="" name="sinalClinico">
                    </div>
                    <img id="exameSaude" src="img/icons8-exame-de-sa%C3%BAde-48.png" alt="">
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h6><i>Medicamentos :</i></h6>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputPassword" placeholder="" name="medicamentos">
                    </div>
                    <img id="comprimidos" src="img/icons8-comprimidos-48.png" alt="">
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h6><i>Histórico social :</i></h6>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputPassword" placeholder="" name="Hsocial">
                    </div>
                    <img id="dinheiroNaMão" src="img/icons8-dinheiro-na-m%C3%A3o-48.png" alt="">
                </div>
                <div id="">

                    <div class="form-row">
                        <div id="form-Bio1" class="form-group col-md-3">
                            <h6><i>Recomendações <br> e orientações :</i></h6>
                        </div>
                        <div id="form-Bio2" class="form-group col-md-5">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" placeholder="" name="recomendacoesOrientacoes"></textarea>
                        </div>
                    </div>

                </div>
                <button style="margin-left: 270px; margin-bottom: 20px;" id="btnentrar" type="submit" class="btn btn-primary">Salvar Av. Clínica nutri.</button>
            </form>

        </div>


        <footer class="container" id="rodape">
            <?php include_once 'rodape.php'; ?>
        </footer>
    </div>

</body>

</html>
