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
            <a href="#" class="list-group-item list-group-item-action">Vet FAO <i class="fas fa-check" style="font-size: 10px; color: #3b884d"></i> </a>
            <a href="tabelaAlimentos.php" class="list-group-item list-group-item-action">Lista de alimentos</a>
            <a href="#" class="list-group-item list-group-item-action">Recordatório 24h</a>
            <a href="form-Dietoterapia.php" class="list-group-item list-group-item-action">Dietoterapia</a>
            <a href="#" class="list-group-item list-group-item-action">Lista de substituições</a>
            <a href="#" class="list-group-item list-group-item-action">Impressão de dieta</a>
        </div>

        <h4 id="menuNutricionista">Valor Energético total &nbsp; <img id="calculadora" src="img/icons8-calculadora-48.png" alt=""></h4>
        <h6 id="menuNutricionista1"><i>Fonte: FAO,WHO,UNU,1985</i></h6>

        <div id="tmb">
            <span id="TMB-Kcal" class="badge badge-pill badge-success">TMB/Kcal:</span> <input type="text" style="border-radius: 4px;">
            <div id="vet">
                <span id="TMB-Kcal" class="badge badge-pill badge-success">VET/Kcal:</span> <input type="text" style="border-radius: 4px;">
            </div>
        </div>

        <div id="form-VET">
            <form action="cadastroVetFao.php" method="post">
                <h5 style="display: inline-block;">Atividade</h5>
                <h5 style="display: inline-block; margin-left: 12px; margin-bottom: 30px;">Horas/Dia</h5>
                <h5 style="display: inline-block; margin-left: 33px;">NAF</h5>

                <div class="form-row">
                    <label for="inputPassword" class="col-4 col-form-label">
                        <h6><i>Sono :</i></h6>
                    </label>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" class="form-control" id="bracoEsq" placeholder="" name="bracoEsq">
                    </div>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" class="form-control" id="bracoDir" placeholder="" name="bracoDir">
                    </div>
                </div>
                <div class="form-row">
                    <label for="inputPassword" class="col-4 col-form-label">
                        <h6><i>Trabalho :</i></h6>
                    </label>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" class="form-control" id="bracoEsq" placeholder="" name="bracoEsq">
                    </div>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" class="form-control" id="bracoDir" placeholder="" name="bracoDir">
                    </div>
                </div>
                <div class="form-row">
                    <label for="inputPassword" class="col-4 col-form-label">
                        <h6><i>Estudo :</i></h6>
                    </label>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" class="form-control" id="bracoEsq" placeholder="" name="bracoEsq">
                    </div>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" class="form-control" id="bracoDir" placeholder="" name="bracoDir">
                    </div>
                </div>
                <div class="form-row">
                    <label for="inputPassword" class="col-4 col-form-label">
                        <h6><i>Exer. físico :</i></h6>
                    </label>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" class="form-control" id="bracoEsq" placeholder="" name="bracoEsq">
                    </div>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" class="form-control" id="bracoDir" placeholder="" name="bracoDir">
                    </div>
                </div>
                <div class="form-row">
                    <label for="inputPassword" class="col-4 col-form-label">
                        <h6><i>À vontade :</i></h6>
                    </label>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" class="form-control" id="bracoEsq" placeholder="" name="bracoEsq">
                    </div>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" class="form-control" id="bracoDir" placeholder="" name="bracoDir">
                    </div>
                </div>
                <div class="form-row">
                    <label for="inputPassword" class="col-4 col-form-label">
                        <h6><i>Ativ. Física :</i></h6>
                    </label>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" class="form-control" id="bracoEsq" placeholder="" name="bracoEsq">
                    </div>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" class="form-control" id="bracoDir" placeholder="" name="bracoDir">
                    </div>
                </div>
                <button style="margin-left: 280px; margin-bottom: 20px; margin-top:60px;" id="btnentrar" type="submit" class="btn btn-primary">Salvar/Gerar VET</button>
            </form>
        </div>

        <div id="tabelaAT">
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th scope="col"><img src="img/icons8-barbell-48.png" alt=""></th>
                        <th scope="col">Masculino</th>
                        <th scope="col">Feminino</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th>Sono</th>
                        <td style="padding-left:30px;">1,00</td>
                        <td style="padding-left:30px;">1,00</td>
                    </tr>
                    <tr>
                        <th>C. ao leito</th>
                        <td style="padding-left:30px;">1,27</td>
                        <td style="padding-left:30px;">1,27</td>
                    </tr>
                    <tr>
                        <th>Leve</th>
                        <td style="padding-left:30px;">1,55</td>
                        <td style="padding-left:30px;">1,56</td>
                    </tr>
                    <tr>
                        <th>Moderado</th>
                        <td style="padding-left:30px;">1,78</td>
                        <td style="padding-left:30px;">1,64</td>
                    </tr>
                    <tr>
                        <th>Intenso</th>
                        <td style="padding-left:30px;">2.1</td>
                        <td style="padding-left:30px;">1,82</td>
                    </tr>
                    <tr>
                        <th>Idoso</th>
                        <td style="padding-left:30px;">1,51</td>
                        <td style="padding-left:30px;">1,52</td>
                    </tr>
                </tbody>
            </table>
        </div>


        <footer class="container" id="rodape">
             <?php include_once 'rodape.php'; ?>
        </footer>
    </div>

</body>

</html>
