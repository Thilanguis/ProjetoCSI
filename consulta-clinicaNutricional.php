<?php include_once 'verificaLogin.php'; ?>

<div class="modal fade bd-example-modal-lg" id="clinicaNutricional" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h4 style="margin-left: 140px;" id="menuNutricionista">Avaliação Clínica Nutricional &nbsp; <i class="fas fa-book-medical" style="font-size: 40px; color: #d83838; text-shadow: none;"></i></h4>

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

            <div id="form-Clinico1">

                <!-- passando id do paciente -->
                <input type="hidden" name="id_cliente" value="<?php echo $_GET["id_cliente"] ?>">
                <input type="hidden" id="paciente" name="paciente" value="<?php echo $row[0]; ?>">

                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h6><i>H. Patológica pregressa :</i></h6>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="HpatologiaPregressa" placeholder="" name="HpatologiaPregressa" value="<?php include_once 'conexao.php';
                       
                        $sql = "select H_PATOLOGICO_PRE from a_clinica_nutricional where ID_CLIENTE = ".$_GET["id_cliente"];
                       
                       $result = mysqli_query($con, $sql);
                       
                       $row = mysqli_fetch_array($result);
                       
                       echo $row[0];
                        ?>
                        ">
                    </div>
                    <img id="virus" src="img/icons8-v%C3%ADrus-48.png" alt="">
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h6><i>Histórico familiar :</i></h6>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="Hfamiliar" placeholder="" name="Hfamiliar" value="<?php include_once 'conexao.php';
                       
                        $sql = "select h_familiar from a_clinica_nutricional where ID_CLIENTE = ".$_GET["id_cliente"];
                       
                       $result = mysqli_query($con, $sql);
                       
                       $row = mysqli_fetch_array($result);
                       
                       echo $row[0];
                        ?>
                        ">
                    </div>
                    <img id="familia" src="img/icons8-fam%C3%ADlia-homem-mulher-48.png" alt="">
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h6><i>Histórico alimentar :</i></h6>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="Halimentar" placeholder="" name="Halimentar" ; value="<?php include_once 'conexao.php';
                       
                        $sql = "select h_alimentar from a_clinica_nutricional where ID_CLIENTE = ".$_GET["id_cliente"];
                       
                       $result = mysqli_query($con, $sql);
                       
                       $row = mysqli_fetch_array($result);
                       
                       echo $row[0];
                        ?>
                        ">
                    </div>
                    <img id="maca" src="img/icons8-ma%C3%A7%C3%A3-48.png" alt="">
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h6><i>Sinal clínico :</i></h6>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="sinalClinico" placeholder="" name="sinalClinico" value="<?php include_once 'conexao.php';
                       
                        $sql = "select sinalclinico from a_clinica_nutricional where ID_CLIENTE = ".$_GET["id_cliente"];
                       
                       $result = mysqli_query($con, $sql);
                       
                       $row = mysqli_fetch_array($result);
                       
                       echo $row[0];
                        ?>
                        ">
                    </div>
                    <img id="exameSaude" src="img/icons8-exame-de-sa%C3%BAde-48.png" alt="">
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h6><i>Medicamentos :</i></h6>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="medicamentos" placeholder="" name="medicamentos" value="<?php include_once 'conexao.php';
                       
                        $sql = "select h_medicamentoso from a_clinica_nutricional where ID_CLIENTE = ".$_GET["id_cliente"];
                       
                       $result = mysqli_query($con, $sql);
                       
                       $row = mysqli_fetch_array($result);
                       
                       echo $row[0];
                        ?>
                        ">
                    </div>
                    <img id="comprimidos" src="img/icons8-comprimidos-48.png" alt="">
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h6><i>Histórico social :</i></h6>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="Hsocial" placeholder="" name="Hsocial" value="<?php include_once 'conexao.php';
                       
                        $sql = "select h_social from a_clinica_nutricional where ID_CLIENTE = ".$_GET["id_cliente"];
                       
                       $result = mysqli_query($con, $sql);
                       
                       $row = mysqli_fetch_array($result);
                       
                       echo $row[0];
                        ?>
                        ">
                    </div>
                    <img id="dinheiroNaMão" src="img/icons8-dinheiro-na-m%C3%A3o-48.png" alt="">
                </div>
                <div id="">

                    <div class="form-row">
                        <div id="form-Bio1" class="form-group col-md-3">
                            <h6><i>Recomendações <br> e orientações :</i></h6>
                        </div>
                        <div id="form-Bio2" class="form-group col-md-5">
                            <textarea class="form-control" id="recomendacoesOrientacoes" rows="10" placeholder="" name="recomendacoesOrientacoes"><?php include_once 'conexao.php';
                       
                        $sql = "select ID_A_CLINICANUTRICIONAL, OBSERVACOES_ADICIONAIS from a_clinica_nutricional where ID_CLIENTE = ".$_GET["id_cliente"];
                       
                       $result = mysqli_query($con, $sql);
                       
                       $row = mysqli_fetch_array($result);
                       
                       echo $row[1];?>
                        </textarea>
                        </div>
                    </div>

                </div>

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <?php echo "<button class='btn btn-primary' type='submit' onclick='atualizarCNutricional(".$row["ID_A_CLINICANUTRICIONAL"].")'>Atualizar</button>" ?>
            </div>



        </div>

    </div>
</div>
