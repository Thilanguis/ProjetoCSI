<?php 
// session_start inicia a sessão
session_start();

// a próxima linhas é responsál em se conectar com o bando de dados.
include_once 'conexao.php';

// as variáveis login e senha recebem os dados digitados na página anterior
$login = ['login'];
$senha = ['senha'];
    
// A variavel $result pega as varias $login e $senha, faz uma 
//pesquisa na tabela de usuarios
$result = mysqli_query("select email, senha from cliente WHERE login = '$login' AND senha = '$senha'");
/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi 
bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor
será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do 
resultado ele redirecionará para a página site.php ou retornara  para a página 
do formulário inicial para que se possa tentar novamente realizar o login */
if(mysqli_num_rows ($result) > 0 )
{
$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
header('location:nutricionistaMenu.php');
}
else{
  unset ($_SESSION['login']);
  unset ($_SESSION['senha']);
  header('location:index.php');
   
  }
?>