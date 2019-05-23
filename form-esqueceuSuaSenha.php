<?php
//conexão com o banco de dados
include_once 'conexao.php';

//pega a variavel via post
$email = $_POST['email'];
//busca no banco o usuario com o email
$sql = "select * from cliente where EMAIL = '".$email."';";
echo $sql;
//passa os dados para dentro de query
$result = mysqli_query($con, $sql);
//conta quantos tem
$registro = mysqli_num_rows($result);
// caso haja mais de um cadastrado...
if($registro == 1){
//fazemos um while para coletarmos as outras informações do usuario
//tais como o nome e a senha
while($row = mysqli_fetch_array($sql)){
                $nome = $row['nome'];
                $senha = $row['senha'];
                }

//envia o email para a pessoa juntamente com seu nome e sua senha
$msg="Olá $nome, você solicitou a recuperação de senha para o sistema xxxxxx\n \n";
$msg.="Sua senha é: $senha";

mail($email, "Recuperação de senha", "$msg");

//alerta que o email foi enviado e o redireciona para outra página
echo"<script>alert('Senha enviada por e-mail, verifique sua caixa de mensagens ou sua caixa de spans.'),window.open('index.php','_self')</script>";
}
//caso contrário
else{
//lhe informa que o seu e-mail não está cadastrado no banco de dados
echo"<script>alert('E-mail não cadastrado em nosso sistema, caso não se lembre do email cadastrado, entre em contato conosco.'),window.open('index.php','_self')</script>";

}
?>
