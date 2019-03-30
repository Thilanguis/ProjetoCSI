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
        
    $nome            = trataNome($_POST["nome"]);
    $telefone        = trataTelefone($_POST["telefone"]);
    $endereco        = $_POST["endereco"];
    $cidade          = $_POST["cidade"];
    $estadoCivil     = $_POST["estadoCivil"];
    $dataNascimento  = $_POST["dataNascimento"];
    $sexo            = $_POST["sexo"];
    $senha           = $_POST["senha"];
    $confirmarSenha  = $_POST["confirmarSenha"];
    $email           = $_POST["email"];
    $confirmarEmail  = $_POST["confirmarEmail"];
    $cpf             = $_POST["cpf"];
    
    include_once 'conexao.php';
        
     $ok = $nome != "" && $telefone != "" && $endereco != "" && $cidade != "" && $estadoCivil != "" && $dataNascimento != "" && $sexo != "" && $senha != "" && $email != "" && $cpf != ""; 
    
    $sql = "insert into cliente values(null, '".$nome."','".$telefone."','".$endereco."','".$cidade."','".$estadoCivil."','".$dataNascimento."','".$sexo."','".$senha."','".$cpf."','".$email."')";
    
        
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
            Contato cadastrado com sucesso!
        </div>

        <div id="btnConfirmacao">
            <a href="index.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button> </a>
        </div>
        <?php
        }
        else
        {
            
         ?>
        <div class="alert alert-warning animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Erro ao cadastrar contato!
        </div>

        <div id="btnConfirmacao">
            <a href="index.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button></a>
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
            <a href="index.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button></a>
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
            <a href="index.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button></a>
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
            <a href="index.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button></a>
        </div>
        <?php
        }
            
            
    mysqli_close($con);
?>

    </div>
</body>

</html>
