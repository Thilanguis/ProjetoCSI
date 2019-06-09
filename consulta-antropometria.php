<?php include_once 'verificaLogin.php'; ?>
<script src="js/consultaGraficoGooglePercentual.js"></script>

<div class="modal fade bd-example-modal-lg" id="antropometria" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h4 style="margin-left: 140px;" id="menuNutricionista">Avaliação Antropométrica &nbsp; <img id="balanca" src="img/icons8-balan%C3%A7a-industrial-48.png" alt=""></h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

            <h5 style="text-align: center;  margin-top: 5px;">Paciente: <?php
                
                include_once 'conexao.php';
                
                $sql = "select nome from cliente where id_cliente=".$_GET["id_cliente"];
                
                $result = mysqli_query($con, $sql);
                
                $row = mysqli_fetch_array($result);
                
                ?><i><?php echo $row[0]; ?></i><?php 
                ?></h5>

            <!-- passando id do paciente -->
            <input type="hidden" name="id_cliente" value="<?php echo $_GET["id_cliente"] ?>">
            <input type="hidden" id="paciente" name="paciente" value="<?php echo $row[0]; ?>">

            <div id id="container" style="margin: 60px 20px; box-shadow: 2px 2px 10px 2px rgba(0, 0, 0, 0.75);">

                <!--Div that will hold the pie chart-->
                <div id="chart_div2">
                    <!-- gráfico do google -->
                </div>
            </div>

            <div id="gerarMedidas1">
                <div class="form-row alturaAntro">
                    <h4 class="col-md-5" style="margin-left: 124px;"><i>Circunferências</i></h4>
                </div>



                <div class="form-row">
                    <label for="bracoEsq">Braço Esq. :</label>
                    <div class="form-group col-md-2">
                        <input type="text" step="0.01" class="form-control" id="bracoEsq" placeholder="" name="bracoEsq" value="<?php include_once 'conexao.php';
                                                     
                        $sql = "select CIR_BRACO_ESQ from a_antropometrica where id_cliente=".$_GET["id_cliente"];                                                                                                      
                        $result = mysqli_query($con, $sql);                                                                                                                             $row = mysqli_fetch_array($result);                                                                                                                             echo $row[0] . " cm";             
                        ?> ">
                    </div>
                    <label style="margin-left: 60px;" for="bracoDir">Braço Dir. :</label>
                    <div class="form-group col-md-2">
                        <input type="text" step="0.01" class="form-control" id="bracoDir" placeholder="" name="bracoDir" value="<?php include_once 'conexao.php';
                                                     
                        $sql = "select CIR_BRACO_DIR from a_antropometrica where id_cliente=".$_GET["id_cliente"];                                                                                                      
                        $result = mysqli_query($con, $sql);                                                                                                                             $row = mysqli_fetch_array($result);                                                                                                                             echo $row[0] . " cm";             
                        ?> ">
                    </div>
                </div>

                <div class="form-row">
                    <label style="margin-left: 20px;" for="cintura">Cintura :</label>
                    <div class="form-group col-md-2">
                        <input type="text" step="0.01" class="form-control" id="cintura" placeholder="" name="cintura" value="<?php include_once 'conexao.php';
                                                     
                        $sql = "select CIR_CINTURA from a_antropometrica where id_cliente=".$_GET["id_cliente"];                                                                                                      
                        $result = mysqli_query($con, $sql);                                                                                                                             $row = mysqli_fetch_array($result);                                                                                                                             echo $row[0] . " cm";             
                        ?> ">
                    </div>
                    <label style="margin-left: 78px;" for="quadril">Quadril :</label>
                    <div class="form-group col-md-2">
                        <input type="text" step="0.01" class="form-control" id="quadril" placeholder="" name="quadril" value="<?php include_once 'conexao.php';
                                                     
                        $sql = "select CIR_QUADRIL from a_antropometrica where id_cliente=".$_GET["id_cliente"];                                                                                                      
                        $result = mysqli_query($con, $sql);                                                                                                                             $row = mysqli_fetch_array($result);                                                                                                                             echo $row[0] . " cm";             
                        ?> ">
                    </div>
                </div>

                <div class="form-row">
                    <label style="margin-left: 33px;" for="torax">Torax :</label>
                    <div class="form-group col-md-2">
                        <input type="text" step="0.01" class="form-control" id="torax" placeholder="" name="torax" value="<?php include_once 'conexao.php';
                                                     
                        $sql = "select CIR_TORAX from a_antropometrica where id_cliente=".$_GET["id_cliente"];                                                                                                      
                        $result = mysqli_query($con, $sql);                                                                                                                             $row = mysqli_fetch_array($result);                                                                                                                             echo $row[0] . " cm";             
                        ?> ">
                    </div>
                    <label style="margin-left: 53px;" for="abdominal">Abdominal :</label>
                    <div class="form-group col-md-2">
                        <input type="text" step="0.01" class="form-control" id="abdominal" placeholder="" name="abdominal" value="<?php include_once 'conexao.php';
                                                     
                        $sql = "select CIR_ABDOMINAL from a_antropometrica where id_cliente=".$_GET["id_cliente"];                                                                                                      
                        $result = mysqli_query($con, $sql);                                                                                                                             $row = mysqli_fetch_array($result);                                                                                                                             echo $row[0] . " cm";             
                        ?> ">
                    </div>

                    <div class=" form-row">
                        <label style="margin-left: 8px;" for="coxaEsq">Coxa Esq. :</label>
                        <div class="form-group col-md-2">
                            <input type="text" step="0.01" class="form-control" id="coxaEsq" placeholder="" name="coxaEsq" value="<?php include_once 'conexao.php';
                                                     
                        $sql = "select CIR_COXA_ESQ from a_antropometrica where id_cliente=".$_GET["id_cliente"];                                                                                                      
                        $result = mysqli_query($con, $sql);                                                                                                                             $row = mysqli_fetch_array($result);                                                                                                                             echo $row[0] . " cm";             
                        ?> ">
                        </div>
                        <label style="margin-left: 66px;" for="coxaDir">Coxa Dir. :</label>
                        <div class="form-group col-md-2">
                            <input type="text" step="0.01" class="form-control" id="coxaDir" placeholder="" name="coxaDir" value="<?php include_once 'conexao.php';
                                                     
                        $sql = "select CIR_COXA_DIR from a_antropometrica where id_cliente=".$_GET["id_cliente"];                                                                                                      
                        $result = mysqli_query($con, $sql);                                                                                                                             $row = mysqli_fetch_array($result);                                                                                                                             echo $row[0] . " cm";             
                        ?> ">
                        </div>
                    </div>

                    <div class="form-row">
                        <label style="margin-left: 8px;" for="panturrilhaEsq">Pant. Esq. :</label>
                        <div class="form-group col-md-2">
                            <input type="text" step="0.01" class="form-control" id="panturrilhaEsq" placeholder="" name="panturrilhaEsq" value="<?php include_once 'conexao.php';
                                                     
                        $sql = "select CIR_PANTURRILHA_ESQ from a_antropometrica where id_cliente=".$_GET["id_cliente"];                                                                                                      
                        $result = mysqli_query($con, $sql);                                                                                                                             $row = mysqli_fetch_array($result);                                                                                                                             echo $row[0] . " cm";             
                        ?> ">
                        </div>
                        <label style="margin-left: 66px;" for="panturrilhaDir">Pant. Dir. :</label>
                        <div class="form-group col-md-2 linha-vertical">
                            <input type="text" step="0.01" class="form-control" id="panturrilhaDir" placeholder="" name="panturrilhaDir" value="<?php include_once 'conexao.php';
                                                     
                        $sql = "select CIR_PANTURRILHA_DIR from a_antropometrica where id_cliente=".$_GET["id_cliente"];                                                                                                      
                        $result = mysqli_query($con, $sql);                                                                                                                             $row = mysqli_fetch_array($result);                                                                                                                             echo $row[0] . " cm";             
                        ?> ">
                        </div>



                    </div>

                    <div class="form-row">
                        <label for="antebracoEsq">A.braço Esq.:</label>
                        <div class="form-group col-md-2">
                            <input type="text" step="0.01" class="form-control" id="antebracoEsq" placeholder="" name="antebracoEsq" value="<?php include_once 'conexao.php';
                                                     
                        $sql = "select CIR_ANTEBRACO_ESQ from a_antropometrica where id_cliente=".$_GET["id_cliente"];                                                                                                      
                        $result = mysqli_query($con, $sql);                                                                                                                             $row = mysqli_fetch_array($result);                                                                                                                             echo $row[0] . " cm";             
                        ?> ">
                        </div>
                        <label style="margin-left: 45px;" for="antebracoDir">A.braço Dir.:</label>
                        <div class="form-group col-md-2">
                            <input type="text" step="0.01" class="form-control" id="antebracoDir" placeholder="" name="antebracoDir" value="<?php include_once 'conexao.php';
                                                     
                        $sql = "select CIR_ANTEBRACO_DIR from a_antropometrica where id_cliente=".$_GET["id_cliente"];                                                                                                      
                        $result = mysqli_query($con, $sql);                                                                                                                             $row = mysqli_fetch_array($result);                                                                                                                             echo $row[0] . " cm";             
                        ?> ">
                        </div>
                    </div>
                </div>


                <div id="gerarIMC">

                    <div class="form-row">

                        <div class="col-8">
                            <h5 style="text-align: center;"><i>IMC</i></h5>

                            <label style="margin-left: 110px;" for="altura">Altura (m) :</label>
                            <input style="text-align: center;" type="text" class="form-control" id="altura" placeholder="" name="altura" onchange="calculoIMC()" value="<?php include_once 'conexao.php';
                                                     
                        $sql = "select altura from a_antropometrica where id_cliente=".$_GET["id_cliente"];                                                                                                      
                        $result = mysqli_query($con, $sql);                                                                                                                             $row = mysqli_fetch_array($result);                                                                                                                             echo number_format($row[0],2) . " Metros";             
                        ?> ">
                        </div>

                        <div class=" col-8">
                            <label style="margin-left: 94px;" for="pesoAtual">Peso Atual (kg)</label>
                            <input style="text-align: center;" type="text" class="form-control" id="pesoAtual" placeholder="" name="pesoAtual" onchange="calculoIMC()" value="<?php include_once 'conexao.php';
                                                     
                        $sql = "select peso from a_antropometrica where id_cliente=".$_GET["id_cliente"];                                                                                                      
                        $result = mysqli_query($con, $sql);                                                                                                                             $row = mysqli_fetch_array($result);                                                                                                                             echo number_format($row[0],2). " Kilograma";             
                        ?> ">
                            <br>
                        </div>
                    </div>
                </div>
            </div>

            <br><br><br>

            <div id="gerarMedidas1">
                <div class="form-row alturaAntro">
                    <h4 class="col-md-5" style="margin-left: 117px;"><i>Dobras Cutâneas</i></h4>
                </div>



                <div class="form-row">
                    <label style="margin-left: 17px;" for="bracoEsq">Tricipital :</label>
                    <div class="form-group col-md-2">
                        <input type="text" step="0.01" class="form-control" id="tricipital" placeholder="" name="tricipital" value="<?php include_once 'conexao.php';
                                                     
                        $sql = "select dc_tricipital from a_antropometrica where id_cliente=".$_GET["id_cliente"];                                                                                                      
                        $result = mysqli_query($con, $sql);                                                                                                                             $row = mysqli_fetch_array($result);                                                                                                                             echo $row[0] . " cm";             
                        ?> ">
                    </div>
                    <label style="margin-left: 24px;" for="bracoDir">Subescapular :</label>
                    <div class="form-group col-md-2">
                        <input type="text" step="0.01" class="form-control" id="subescapular" placeholder="" name="subescapular" value="<?php include_once 'conexao.php';
                                                     
                        $sql = "select DC_SUBESCAPULAR_AXILAR from a_antropometrica where id_cliente=".$_GET["id_cliente"];                                                                                                      
                        $result = mysqli_query($con, $sql);                                                                                                                             $row = mysqli_fetch_array($result);                                                                                                                             echo $row[0] . " cm";             
                        ?> ">
                    </div>
                </div>

                <div class="form-row">
                    <label style="margin-left: 0px;" for="cintura">Suprailíaca :</label>
                    <div class="form-group col-md-2">
                        <input type="text" step="0.01" class="form-control" id="suprailiaca" placeholder="" name="suprailiaca" value="<?php include_once 'conexao.php';
                                                     
                        $sql = "select DC_SUPRAILIACA from a_antropometrica where id_cliente=".$_GET["id_cliente"];                                                                                                      
                        $result = mysqli_query($con, $sql);                                                                                                                             $row = mysqli_fetch_array($result);                                                                                                                             echo $row[0] . " cm";             
                        ?> ">
                    </div>
                    <label style="margin-left: 39px;" for="quadril">Abdominal :</label>
                    <div class="form-group col-md-2">
                        <input type="text" step="0.01" class="form-control" id="dcAbdominal" placeholder="" name="dcAbdominal" value="<?php include_once 'conexao.php';
                                                     
                        $sql = "select DC_ABDOMINAL from a_antropometrica where id_cliente=".$_GET["id_cliente"];                                                                                                      
                        $result = mysqli_query($con, $sql);                                                                                                                             $row = mysqli_fetch_array($result);                                                                                                                             echo $row[0] . " cm";             
                        ?> ">
                    </div>
                </div>

                <div class="form-row">
                    <label style="margin-left: 85px;" for="torax">Quadríceps :</label>
                    <div class="form-group col-md-2">
                        <input type="text" step="0.01" class="form-control" id="quadriceps" placeholder="" name="quadriceps" value="<?php include_once 'conexao.php';
                                                     
                        $sql = "select DC_QUADRICEPS, id_antropometria from a_antropometrica where id_cliente=".$_GET["id_cliente"];                                                                                                      
                        $result = mysqli_query($con, $sql);                                                                                                                             $row = mysqli_fetch_array($result);                                                                                                                             echo $row[0] . " cm";             
                        ?> ">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <?php echo "<button class='btn btn-primary' type='submit' onclick='atualizarAntropometria(".$row["id_antropometria"].")'>Atualizar</button>" ?>
            </div>

        </div>
    </div>
</div>

<!-- input escondido do percentual de gordura -->
<input id="percentualGorduraInput" type="hidden" value="<?php
                   include_once 'conexao.php';
                   
                   $sql = "select DC_TRICIPITAL, DC_SUBESCAPULAR_AXILAR, DC_SUPRAILIACA, DC_ABDOMINAL, DC_QUADRICEPS from a_antropometrica where id_cliente =".$_GET["id_cliente"];
                   
                   $result = mysqli_query($con, $sql);
                   
                   $row = mysqli_fetch_array($result);
                   
                   //declarando variáveis
                   $tricipital = $row[0];
                   $subescapular_axilar = $row [1];
                   $suprailiaca = $row[2];
                   $abdominal = $row[3];
                   $quadriceps = $row[4];
                   
                   //calculando % de gordura e livre de gordura
                   
                   $resultado1 = ($tricipital + $subescapular_axilar + $suprailiaca + $abdominal) * 0.153 + 5.783;
                   
                   $resultado2 = ($tricipital + $subescapular_axilar + $suprailiaca + $abdominal + $quadriceps) * 0.8 * 0.153 + 5.783;
                   
                   if ($quadriceps != 0) {
                        echo number_format($resultado2,2) ." % de gordura";
                    }
                   else {
                        echo number_format($resultado1,2) ." % de gordura";
                   }           
        ?>">

<!-- input para pegar percentual livre gordura input -->
<input id="percentualLivreGorduraInput" type="hidden" value="<?php 
                   include_once 'conexao.php';
                   
                   $sql = "select DC_TRICIPITAL, DC_SUBESCAPULAR_AXILAR, DC_SUPRAILIACA, DC_ABDOMINAL, DC_QUADRICEPS from a_antropometrica where id_cliente =".$_GET["id_cliente"];
                   
                   $result = mysqli_query($con, $sql);
                   
                   $row = mysqli_fetch_array($result);
                   
                   //declarando variáveis
                   $tricipital = $row[0];
                   $subescapular_axilar = $row [1];
                   $suprailiaca = $row[2];
                   $abdominal = $row[3];
                   $quadriceps = $row[4];
                   
                   //calculando % de gordura e livre de gordura
                   
                   $resultado1 = ($tricipital + $subescapular_axilar + $suprailiaca + $abdominal) * 0.153 + 5.783;
                   
                   $resultado2 = ($tricipital + $subescapular_axilar + $suprailiaca + $abdominal + $quadriceps) * 0.8 * 0.153 + 5.783;
                   
                   if ($quadriceps != 0) {
                        echo number_format(100 - $resultado2,2) ." % de gordura";
                    }
                   else {
                        echo number_format(100 - $resultado1,2) ." % de gordura";
                   }           
        ?>">
