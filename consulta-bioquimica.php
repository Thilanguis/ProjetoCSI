<?php include_once 'verificaLogin.php'; ?>

<div class="modal fade bd-example-modal-lg" id="bioquimica" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h4 style="margin-left: 180px;" id="menuNutricionista">Avaliação Bioquímica &nbsp; <img id="microscopio" src="img/icons8-microsc%C3%B3pio-96.png" alt=""></h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

            <div id="form-Bio3">


                <!-- passando id do paciente -->
                <input type="hidden" name="id_cliente" value="<?php echo $_GET["id_cliente"] ?>">

                <div class="form-row">
                    <div id="form-Bio1" class="form-group col-md-3">
                        <h5>Dados &nbsp; <img id="serginga" src="img/icons8-seringa-96.png" alt=""> <br> Bioquímicos : <img id="gotaDeSangue" src="img/icons8-gota-de-sangue-96.png" alt=""></h5> <img id="tuboDeEnsaio" src="img/icons8-tubo-de-ensaio-96.png" alt="">
                    </div>
                    <div id="form-Bio2" class="form-group col-md-8">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="14" placeholder="" name="bioquimica"><?php include_once 'conexao.php';
                       
                        $sql = "select LISTA_HEMOGRAMA_COMPLETO from a_bioquimica where ID_CLIENTE = ".$_GET["id_cliente"];
                       
                       $result = mysqli_query($con, $sql);
                       
                       $row = mysqli_fetch_array($result);
                       
                       echo $row[0];
                        ?>
                        </textarea>
                    </div>
                </div>



            </div>



            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>



        </div>

    </div>
</div>
