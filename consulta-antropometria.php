<?php include_once 'verificaLogin.php'; ?>
<script src="js/graficoGooglePercentual.js"></script>

<div class="modal fade bd-example-modal-lg" id="antropometria" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h4 style="margin-left: 140px;" id="menuNutricionista">Avaliação Antropométrica &nbsp; <img id="balanca" src="img/icons8-balan%C3%A7a-industrial-48.png" alt=""></h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            
            <h5 style="text-align: center;  margin-top: 5px;">Paciente: <?php
                
                include_once 'conexao.php';
                
                $sql = "select nome from cliente where id_cliente=".$_GET["id_cliente"];
                
                $result = mysqli_query($con, $sql);
                
                $row = mysqli_fetch_array($result);
                
                ?><i><?php echo $row[0]; ?></i><?php 
                ?></h5>

            <div id="" style="margin: 60px 140px; box-shadow: 2px 2px 10px 2px rgba(0, 0, 0, 0.75);">

                <!--Div that will hold the pie chart-->
                <div id="chart_div1">
                    <!-- gráfico do google -->
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
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
