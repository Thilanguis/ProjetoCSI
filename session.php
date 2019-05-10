<?php
    
    include_once 'head.php';

    session_start();

    $login = $_POST["login"];
    $senha = $_POST["senha"];
    include_once 'conexao.php';
    $sql = "select nome, crn, senha from nutricionista where crn = '".$login."' and senha = '".$senha."';";
    $query = mysqli_query($con, $sql) or die(mysqli_error($con));
    $row = mysqli_num_rows($query);
    $nome = mysqli_fetch_array($query)["nome"];

if ($row > 0)
{
    $_SESSION["login"] = $nome;
    $_SESSION["senha"] = $senha;
    header("Location:nutricionistaMenu.php");
 }
else
{
    ?>
<div class="alert alert-danger animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
    Crn ou senha digitados errado!
</div>

<div id="btnConfirmacao">
    <a href="index.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button></a>
</div>

<?php
}
?>
