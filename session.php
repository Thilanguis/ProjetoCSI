<?php
    session_start();

    $login = $_POST["login"];
    $senha = $_POST["senha"];
    include_once 'conexao.php';
    $sql = "select nome, email, senha from cliente where email = '".$login."' and senha = '".$senha."';";
    $query = mysqli_query($con, $sql) or die(mysqli_error($con));
    $row = mysqli_num_rows($query);
    $nome = mysqli_fetch_assoc($query)["nome"];

if ($row > 0)
{
    $_SESSION["login"] = $nome;
    $_SESSION["senha"] = $senha;
    header("Location:nutricionistaMenu.php");
 }
else
{
    header("Location:index.php");
}
?>
