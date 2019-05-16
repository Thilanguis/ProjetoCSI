<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
    <?php include_once 'head.php';
    include_once 'verificaLogin.php';?> 

<script src="js/ajaxCEP.js"></script>
    
</head>
<body>
    
    <?php
    
    if(isset($_GET["id_paciente"]))
    
    ?>
    <input type="hidden" value="<?php echo $_GET["id_paciente"]; ?>">
          
    <?php
           
    include_once 'conexao.php';
    
    $sql = "select * from cliente where ID_CLIENTE=".$_GET["id_paciente"];
           
    $result = mysqli_query($con, $sql);
    
    $row = mysqli_fetch_array($result);
    
    ?>       

    <div id="fundoSistemaInterno" class="container">
        

        <nav class="navbar navbar-dark container" style="background-color:#3b884d;">
            <button id="teste" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span> <i class="fas fa-carrot animated rubberBand" style="font-size: 30px; color: #c78713"></i> &nbsp; <i class="fas fa-apple-alt animated rubberBand" style="font-size: 30px; color: #d83838"></i> &nbsp; <i class="fas fa-cheese animated rubberBand" style="font-size: 30px; color: #ccc624"></i> </span>
            </button>
            <div> <img src="img/icons8-checked-user-male-26.png" alt=""> <b>Bem-vindo nutricionista:</b>
                <?php echo "<i>"  .$_SESSION["login"] . "</i>" ; ?> <a style="text-decoration: none;" href="logout.php">&nbsp;<img id="logout" src="img/icons8-exit-48.png" alt=""></a>
            </div>
        </nav>

        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="margin-left: 80px;">
                    <h3><b>Editar dados do paciente &nbsp; <i class="fas fa-user-plus" style=" font-size: 30px; color: #4c89e3"></i></b></h3>
                </h5>
                <a href="nutricionistaMenu.php"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></a>
            </div>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

            <div class="modal-body">

                <form action="atualizarCliente.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $_GET["id_paciente"]; ?> ">

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label style="margin-left: 185px;" for="nome">Nome Completo</label> &nbsp; <i class="fas fa-signature" style="font-size: 25px; color: #314bd8;"></i>
                            <input style="text-align: center;" type="text" class="form-control" id="nome" name="nome" value="<?php echo $row["NOME"]; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label style="margin-left: 60px;" for="telefone">Telefone Celular</label> &nbsp; <i class="fas fa-mobile-alt" style="font-size: 25px; color: #d11818"></i>
                            <input style="text-align: center;" type="tel" class="form-control" id="telefone" name="telefone" maxlength="11" pattern="([0-9]{11})" title="Digitar telefone com DDD e não usar caracteres especiais" value="<?php echo $row["TELEFONE"]; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label style="margin-left: 90px;" for="cep">CEP</label> &nbsp; <i class="fas fa-map" style="font-size: 26px; color: #d1ca18"></i>
                            <input type="text" class="form-control" id="cep" name="cep" style="text-align: center" value="<?php echo $row["CEP"]; ?>" size="10" maxlength="9">
                        </div>
                        <div class="form-group col-md-8">
                            <label style="margin-left: 185px;" for="endereco">Endereço</label> &nbsp; <i class="fas fa-map-marked-alt" style="font-size: 25px; color: #27b75f"></i>
                            <input style="text-align: center;" type="text" class="form-control" id="rua" name="rua" readonly value="<?php echo $row["ENDERECO"]; ?>">
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label style="margin-left: 85px;" for="bairro">Bairro</label> &nbsp; <i class="fas  fa-home" style="font-size: 25px; color: #d11818;"></i>
                            <input style="text-align: center;" type="text" class="form-control" id="bairro" name="bairro" readonly value="<?php echo $row["BAIRRO"]; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label style="margin-left: 90px;" for="cidade">Cidade</label> &nbsp; <i class="fas fa-city" style="font-size: 25px; color: #be31d8"></i>
                            <input type="text" class="form-control" id="cidade" name="cidade" style="text-align: center" readonly value="<?php echo $row["CIDADE"]; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label style="margin-left: 90px;" for="uf">Estado</label> &nbsp; <i class="fas fa-map-marker-alt" style="font-size: 25px; color: #be31d8"></i>
                            <input style="text-align: center;" type="text" class="form-control" id="uf" name="uf" readonly value="<?php echo $row["ESTADO"]; ?>">
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label style="margin-left: 70px;" for="estadoCivil">Estado Civil</label> &nbsp; <i class="fas fa-church" style="font-size: 25px; color: #d11818"></i>
                            <input style="text-align: center;" type="text" class="form-control" id="estadoCivil" name="estadoCivil" value="<?php echo $row["ESTADO_CIVIL"]; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label style="margin-left: 35px;" for="dataNascimento">Data de Nascimento</label> &nbsp; <i class="fas fa-calendar-day" style="font-size: 25px; color: #314bd8"></i>
                            <input style="text-align: center; padding-left: 15%;" type="date" class="form-control" id="dataNascimento" name="dataNascimento" value="<?php echo $row["DT_NASCIMENTO"]; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label style="margin-left: 90px;" for="sexo">Sexo</label> &nbsp; <i class="fas fa-male" style="font-size: 25px; color: #314bd8"></i> <i class="fas fa-female" style="font-size: 25px; color: #be31d8"></i>
                            <select type="text" class="form-control is-invalid" id="sexo" name="sexo">
                                <option value="" selected>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Escolha</option>
                                <option value="Masculino">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Masculino</option>
                                <option value="Feminino">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Feminino</option>
                            </select>
                            <div class="invalid-feedback">
                              Por favor, escolha um sexo!
                            </div>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label style="margin-left: 160px;" for="senha">Senha</label> &nbsp; <i class="fas fa-key" style="font-size: 25px; color: #d1ca18;"></i>
                            <input style="text-align: center;" type="password" class="form-control" id="senha" name="senha" value="<?php echo $row["SENHA"]; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label style="margin-left: 120px;" for="confirmarSenha"> Confirmar Senha</label> &nbsp; <i class="fas fa-key" style="font-size: 25px; color: #d1ca18;"></i>
                            <input style="text-align: center;" type="password" class="form-control" id="confirmarSenha" name="confirmarSenha" value="<?php echo $row["SENHA"]; ?>">
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label style="margin-left: 90px;" for="email">E-mail</label> &nbsp; <i class="fas fa-mail-bulk" style="font-size: 25px; color: #27b75f"></i>
                            <input style="text-align: center;" type="email" class="form-control" id="email" name="email" value="<?php echo $row["EMAIL"]; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label style="margin-left: 50px;" for="confirmarEmail">Confirmar E-mail</label> &nbsp; <i class="fas fa-mail-bulk" style="font-size: 25px; color: #27b75f"></i>
                            <input style="text-align: center;" type="email" class="form-control" id="confirmarEmail" name="confirmarEmail" value="<?php echo $row["EMAIL"]; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label style="margin-left: 90px;" for="cpf">Cpf</label> &nbsp; <i class="far fa-id-card" style="font-size: 25px; color: #d11818"></i>
                            <input style="text-align: center;" type="cpf" class="form-control" id="email1" name="cpf" value="<?php echo $row["CPF"]; ?>">
                        </div>

                    </div>
                    <div id="campos">
                        <p>* Preencher todos os campos</p>
                    </div>
                    <div class="modal-footer">
                        <a href="nutricionistaMenu.php"><button type="button" class="btn btn-secondary">Fechar</button></a>
                        <input id="btnCadastrar" type="submit" class="btn btn-primary" value="Atualizar">
                    </div>
                </form>

            </div>

        </div>
    </div>



        

        <footer class="container" id="rodape">
            <?php include_once 'rodape.php'; ?>
        </footer>

    </div>

</body>
</html>