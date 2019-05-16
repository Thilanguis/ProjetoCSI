<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <title>Dietpro</title>
    <?php include_once 'head.php'; 
    ?>

</head>

<body>
    <div class="">

        <?php
        
         include_once 'funcoesProjeto.php';
    $id              = $_POST["id"];    
    $nome            = trataNome($_POST["nome"]);
    $telefone        = trataTelefone($_POST["telefone"]);
    $cep             = $_POST["cep"];
    $endereco        = $_POST["rua"];
    $bairro          = trataNome($_POST["bairro"]);
    $cidade          = trataNome($_POST["cidade"]);
    $estado          = trataNome($_POST["uf"]);
    $estadoCivil     = trataNome($_POST["estadoCivil"]);
    $dataNascimento  = $_POST["dataNascimento"];
    $sexo            = $_POST["sexo"];
    $senha           = $_POST["senha"];
    $confirmarSenha  = $_POST["confirmarSenha"];
    $email           = $_POST["email"];
    $confirmarEmail  = $_POST["confirmarEmail"];
    $cpf             = $_POST["cpf"];
    
    include_once 'conexao.php';
        
     $ok = $nome != "" && $telefone != "" && $cep && $endereco != "" && $bairro != "" && $cidade != "" && $estado != "" && $estadoCivil != "" && $dataNascimento != "" && $sexo != "" && $senha != "" && $email != "" && $cpf != ""; 
    
    $sql = "update cliente set nome='".$nome."', telefone='".$telefone."', cep='".$cep."', endereco='".$endereco."', bairro='".$bairro."', cidade='".$cidade."', estado='".$estado."', estado_civil='".$estadoCivil."', dt_nascimento='".$dataNascimento."', sexo='".$sexo."', senha='".$senha."',cpf='".$cpf."', email='".$email."' where id_cliente=".$id;
    
        
    $verificarS = $senha == $confirmarSenha;
        
    $verificarE = $email == $confirmarEmail;    

   
if($verificarE)
{        
    if($verificarS)      
{
        if($ok)
{
            if(mysqli_query($con,$sql))  
    {
         ?>
        <div class="alert alert-success animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Paciente atualizado com sucesso!
        </div>

        <div id="btnConfirmacao">
            <?php echo "<a href='nutricionistaMenu.php?id_paciente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ?>
        </div>
        <?php
        }
        else
        {
            
         ?>
        <div class="alert alert-warning animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Erro ao atualizar paciente!
        </div>

        <div id="btnConfirmacao">
            <?php echo "<a href='form-editarPacienteNovo.php?id_paciente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ; echo mysqli_error($con);?>
        </div>
        <?php
        }
        }
        
        else
        {
    ?>
        <div class="alert alert-danger animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Favor preencher todos os campos!
        </div>

        <div id="btnConfirmacao">
            <?php echo "<a href='form-editarPacienteNovo.php?id_paciente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ?>
        </div>
        <?php
        }
        }
        else
            
        {
        ?>
        <div class="alert alert-danger animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Senhas não conferem!
        </div>

        <div id="btnConfirmacao">
            <?php echo "<a href='form-editarPacienteNovo.php?id_paciente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ?>
        </div>
        <?php
        }
    }
        
else
            
        {
        ?>
        <div class="alert alert-danger animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Emails não conferem!
        </div>

        <div id="btnConfirmacao">
            <?php echo "<a href='form-editarPacienteNovo.php?id_paciente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ?>
        </div>
        <?php
        }
            
            
    mysqli_close($con);
?>

    </div>
</body>

</html>
