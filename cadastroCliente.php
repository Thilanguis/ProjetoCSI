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
    $cpf             = formatarCPF($_POST["cpf"]);
    
    include_once 'conexao.php';
        
     $ok = $nome != "" && $telefone != "" && $cep && $endereco != "" && $bairro != "" && $cidade != "" && $estado != "" && $estadoCivil != "" && $dataNascimento != "" && $sexo != "" && $senha != "" && $email != "" && $cpf != ""; 
    
    $sql = "insert into cliente values(null, '".$nome."','".$telefone."','".$cep."','".$endereco."','".$bairro."','".$cidade."','".$estado."','".$estadoCivil."','".$dataNascimento."','".$sexo."','".$senha."','".$cpf."','".$email."', now())";
    
        
    $verificarS = $senha == $confirmarSenha;
        
    $verificarE = $email == $confirmarEmail;    
        
header('refresh:2,index.php');  
if($verificarE)
{   header('refresh:2,index.php');     
    if($verificarS)      
{   header('refresh:2,index.php');
        if($ok)
{   header('refresh:2,index.php');
            if(mysqli_query($con,$sql))  
    {   header('refresh:2,index.php');
         ?>
        <div class="alert alert-success animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px; text-align: center;">
            Registro feito com sucesso!
        </div>

        <!-- <div id="btnConfirmacao">
            <a href="index.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button> </a>
        </div> -->
        <?php
        }
        else
        {
            
         ?>
        <div class="alert alert-warning animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px; text-align: center;">
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
        <div class="alert alert-danger animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px; text-align: center;">
            Favor preencher todos os campos!
        </div>

        <!-- <div id="btnConfirmacao">
            <a href="index.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button></a>
        </div> -->
        <?php
        }
        }
        else
            
        {
        ?>
        <div class="alert alert-danger animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px; text-align: center;">
            Senhas não conferem!
        </div>

        <!-- <div id="btnConfirmacao">
            <a href="index.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button></a>
        </div> -->
        <?php
        }
    }
        
else
            
        {
        ?>
        <div class="alert alert-danger animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px; text-align: center;">
            Emails não conferem!
        </div>

        <!-- <div id="btnConfirmacao">
            <a href="index.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button></a>
        </div> -->
        <?php
        }
            
            
    mysqli_close($con);
?>

    </div>
</body>

</html>
