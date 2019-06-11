<?php include_once 'verificaLogin.php'; ?>

<div class="modal fade bd-example-modal-lg" id="vetfao" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
               
               <!-- passando id do paciente -->
                <input type="hidden" name="id_cliente" value="<?php echo $_GET["id_cliente"] ?>">
                <input type="hidden" id="paciente" name="paciente" value="<?php echo $row[0]; ?>">

                <h4 style="margin-left: 190px;" id="menuNutricionista">Valor Energético total &nbsp;<img id="calculadora" src="img/icons8-calculadora-48.png" alt=""></h4></div>
        <h6 style="margin-left: 60px;" id="menuNutricionista1"><i>Fonte: FAO,WHO,UNU,1985</i></h6>
            
            
            
            <div id="tmbConsulta">
            <span id="TMB-Kcal" class="badge badge-pill badge-success">TMB/Kcal:</span>
            <input id="tmbPaciente" type="text" onchange="calcularNafTotal()" style="border-radius: 4px;" disabled value=" <?php
            
            include_once 'conexao.php';
                
            $sql = "select DT_NASCIMENTO, PESO, ALTURA, SEXO from cliente inner join a_antropometrica ON cliente.ID_CLIENTE = a_antropometrica.ID_CLIENTE where cliente.ID_CLIENTE =".$_GET["id_cliente"];
                
            $result = mysqli_query($con, $sql);
                
            $row = mysqli_fetch_array($result);
                
                $data = $row["DT_NASCIMENTO"];
                
                // separando yyyy, mm, ddd
            list($ano, $mes, $dia) = explode('-', $data);

            // data atual
            $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            // Descobre a unix timestamp da data de nascimento do fulano
            $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

            // cálculo
            $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
                
            //declarando variáveis
            $peso = $row[1];   
            $altura = $row[2];   
            $sexo = $row[3];
                
            //calculando TMB
    if($sexo == "Masculino"){
		if($idade >= 10 && $idade < 18){
		echo number_format($resultadoTMB = (17.5 * $peso) + 651,2) . " Kcal";
		}
		if($idade >= 18 && $idade < 30){
		echo number_format($resultadoTMB = (15.3 * $peso) + 679,2) . " Kcal";
		}
		if($idade >= 30 && $idade < 60){
		echo number_format($resultadoTMB = (11.6 * $peso) + 879,2) . " Kcal";
		}
		if($idade >= 60){
		echo number_format($resultadoTMB = (13.5 * $peso) + 487,2) . " Kcal";
		}
	}
	if($sexo == "Feminino"){
		if($idade >= 10 && $idade < 18){
		echo number_format($resultadoTMB = (12.2 * $peso)+ 746,2) . " Kcal";
		}
		if($idade >= 18 && $idade < 30){
		echo number_format($resultadoTMB = (14.7 * $peso) + 496,2) . " Kcal";
		}
		if($idade >= 30 && $idade < 60){
		echo number_format($resultadoTMB = (8.5 * $peso) + 829,2) . " Kcal";
		}
		if($idade >= 60){
		echo number_format($resultadoTMB = (10.5 * $peso) + 596,2) . " Kcal";
		}
	
	}
                
            ?> ">
        </div>

        <div id="form-VETConsulta">

                <!-- passando id do paciente -->
                <input type="hidden" name="id_cliente" value="<?php echo $_GET["id_cliente"] ?>">

                <h5 style="display: inline-block;">Atividade</h5>
                <h5 style="display: inline-block; margin-left: 12px; margin-bottom: 30px;">Horas/Dia</h5>
                <h5 style="display: inline-block; margin-left: 33px;" title="Nível atividade física">NAF</h5>
                
                <?php
                include_once 'conexao.php';
                       
                $sql = "select * from vet_fao where id_cliente=".$_GET["id_cliente"];
                       
                $result = mysqli_query($con, $sql);
                       
                $row = mysqli_fetch_array($result);
                ?>

                <div class="form-row">
                    <label for="inputPassword" class="col-4 col-form-label">
                        <h6><i>Sono :</i></h6>
                    </label>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="sono" onchange="calcularNafTotal()" name="sono" value="<?php
                include_once 'conexao.php';
                       
                $sql = "select sono from vet_fao where id_cliente=".$_GET["id_cliente"];
                       
                $result = mysqli_query($con, $sql);
                       
                $row = mysqli_fetch_array($result);
                
                echo $row[0];
                ?>">
                    </div>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="NAF_sono" onchange="calcularNafTotal()" name="NAF_sono" value="<?php
                include_once 'conexao.php';
                       
                $sql = "select hora_sono from vet_fao where id_cliente=".$_GET["id_cliente"];
                       
                $result = mysqli_query($con, $sql);
                       
                $row = mysqli_fetch_array($result);
                
                echo $row[0];
                ?>">
                    </div>
                </div>
                <div class="form-row">
                    <label for="inputPassword" class="col-4 col-form-label">
                        <h6><i>Trabalho :</i></h6>
                    </label>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="trabalho" onchange="calcularNafTotal()" name="trabalho" value="<?php
                include_once 'conexao.php';
                       
                $sql = "select trabalho from vet_fao where id_cliente=".$_GET["id_cliente"];
                       
                $result = mysqli_query($con, $sql);
                       
                $row = mysqli_fetch_array($result);
                
                echo $row[0];
                ?>">
                    </div>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="NAF_trabalho" onchange="calcularNafTotal()" name="NAF_trabalho" value="<?php
                include_once 'conexao.php';
                       
                $sql = "select hora_trabalho from vet_fao where id_cliente=".$_GET["id_cliente"];
                       
                $result = mysqli_query($con, $sql);
                       
                $row = mysqli_fetch_array($result);
                
                echo $row[0];
                ?>">
                    </div>
                </div>
                <div class="form-row">
                    <label for="inputPassword" class="col-4 col-form-label">
                        <h6><i>Estudo :</i></h6>
                    </label>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="estudo" onchange="calcularNafTotal()" name="estudo" value="<?php
                include_once 'conexao.php';
                       
                $sql = "select estudo from vet_fao where id_cliente=".$_GET["id_cliente"];
                       
                $result = mysqli_query($con, $sql);
                       
                $row = mysqli_fetch_array($result);
                
                echo $row[0];
                ?>">
                    </div>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="NAF_estudo" onchange="calcularNafTotal()" placeholder="" name="NAF_estudo" value="<?php
                include_once 'conexao.php';
                       
                $sql = "select hora_estudo from vet_fao where id_cliente=".$_GET["id_cliente"];
                       
                $result = mysqli_query($con, $sql);
                       
                $row = mysqli_fetch_array($result);
                
                echo $row[0];
                ?>">
                    </div>
                </div>
                <div class="form-row">
                    <label for="inputPassword" class="col-4 col-form-label">
                        <h6><i>Exer. físico :</i></h6>
                    </label>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="exerFisico" onchange="calcularNafTotal()" name="exerFisico" value="<?php
                include_once 'conexao.php';
                       
                $sql = "select EXER_FISICO from vet_fao where id_cliente=".$_GET["id_cliente"];
                       
                $result = mysqli_query($con, $sql);
                       
                $row = mysqli_fetch_array($result);
                
                echo $row[0];
                ?>">
                    </div>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="NAF_exerFisico" onchange="calcularNafTotal()" name="NAF_exerFisico" value="<?php
                include_once 'conexao.php';
                       
                $sql = "select Hora_Exer_fisico from vet_fao where id_cliente=".$_GET["id_cliente"];
                       
                $result = mysqli_query($con, $sql);
                       
                $row = mysqli_fetch_array($result);
                
                echo $row[0];
                ?>">
                    </div>
                </div>
                <div class="form-row">
                    <label for="inputPassword" class="col-4 col-form-label">
                        <h6><i>À vontade :</i></h6>
                    </label>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="avontade" onchange="calcularNafTotal()" name="avontade" value="<?php
                include_once 'conexao.php';
                       
                $sql = "select a_vontade from vet_fao where id_cliente=".$_GET["id_cliente"];
                       
                $result = mysqli_query($con, $sql);
                       
                $row = mysqli_fetch_array($result);
                
                echo $row[0];
                ?>">
                    </div>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="NAF_avontade" onchange="calcularNafTotal()" name="NAF_avontade" value="<?php
                include_once 'conexao.php';
                       
                $sql = "select hora_a_vontade from vet_fao where id_cliente=".$_GET["id_cliente"];
                       
                $result = mysqli_query($con, $sql);
                       
                $row = mysqli_fetch_array($result);
                
                echo $row[0];
                ?>">
                    </div>
                </div>
                <div class="form-row">
                    <label for="inputPassword" class="col-4 col-form-label">
                        <h6><i>Ativ. Física :</i></h6>
                    </label>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="ativFisica" onchange="calcularNafTotal()" name="ativFisica" value="<?php
                include_once 'conexao.php';
                       
                $sql = "select ativ_fisica from vet_fao where id_cliente=".$_GET["id_cliente"];
                       
                $result = mysqli_query($con, $sql);
                       
                $row = mysqli_fetch_array($result);
                
                echo $row[0];
                ?>">
                    </div>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="NAF_ativFisica" onchange="calcularNafTotal()" name="NAF_ativFisica" value="<?php
                include_once 'conexao.php';
                       
                $sql = "select hora_ativ_fisica from vet_fao where id_cliente=".$_GET["id_cliente"];
                       
                $result = mysqli_query($con, $sql);
                       
                $row = mysqli_fetch_array($result);
                
                echo $row[0];
                ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <h6><i>24 horas/dia:</i></h6>
                    </div>
                    <div class="form-group" id="resultadoConta">

                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <h6><i>NAF total:</i></h6>
                    </div>
                    <div class="form-group" id="resultadoNAF">

                    </div>
                </div>
        </div>

        <div id="tabelaATConsulta">
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th></th>
                        <th style="text-align: center;" scope="col">
                            Nível de atividade física
                        </th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th scope="col-4"><img src="img/icons8-barbell-48.png" alt=""></th>
                        <th style="text-align: center;" scope="col-4">Masculino</th>
                        <th style="" scope="col-4">Feminino</th>
                        <th></th>
                    </tr>

                </thead>

                <tbody>
                    <tr>
                        <th>Sono</th>
                        <td style="text-align: center;">1,00</td>
                        <td style="text-align: center;">1,00</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>C. ao leito</th>
                        <td style="text-align: center;">1,27</td>
                        <td style="text-align: center;">1,27</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Leve</th>
                        <td style="text-align: center;">1,55</td>
                        <td style="text-align: center;">1,56</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Moderado</th>
                        <td style="text-align: center;;">1,78</td>
                        <td style="text-align: center;;">1,64</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Intenso</th>
                        <td style="text-align: center;;">2.1</td>
                        <td style="text-align: center;;">1,82</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Idoso</th>
                        <td style="text-align: center;;">1,51</td>
                        <td style="text-align: center;;">1,52</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

            <?php
                include_once 'conexao.php';
                       
                $sql = "select id_vet_fao from vet_fao where id_cliente=".$_GET["id_cliente"];
                       
                $result = mysqli_query($con, $sql);
                       
                $row = mysqli_fetch_array($result);
                
                echo $row[0];
                ?>
            
            

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <?php echo "<button class='btn btn-primary' type='submit' onclick='atualizarVetFao(".$row["id_vet_fao"].")'>Atualizar</button>" ?>
            </div>



        

    </div>
</div>
</div>