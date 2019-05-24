<?php
//conexão com o banco de dados
include_once 'conexao.php';

//pega a variavel via post
$email = $_POST['email'];
//busca no banco o usuario com o email
$sql = "select nome, senha from cliente where email = '".$email."'";

//passa os dados para dentro de query
$result = mysqli_query($con, $sql);
//conta quantos tem
$registro = mysqli_num_rows($result);
// caso haja mais de um cadastrado...
if($registro == 1){
//fazemos um while para coletarmos as outras informações do usuario
//tais como o nome e a senha
while($row = mysqli_fetch_array($result)){
                $nome = $row[0];
                $senha = $row[1];
                }

//envia o email para a pessoa juntamente com seu nome e sua senha
$msg="Olá $nome, você solicitou a recuperação de senha para o sistema xxxxxx\n \n";
$msg.="Sua senha é: $senha";

$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Gabriel Granado <gabrielt@2005@hotmail.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

mail($email, "Recuperação de senha","testando" , $headers);

//alerta que o email foi enviado e o redireciona para outra página
echo"<script>alert('Senha enviada por e-mail, verifique sua caixa de mensagens ou sua caixa de spans.'),window.open('index.php','_self')</script>";
}
//caso contrário
else{
//lhe informa que o seu e-mail não está cadastrado no banco de dados
echo"<script>alert('E-mail não cadastrado em nosso sistema, caso não se lembre do email cadastrado, entre em contato conosco.'),window.open('index.php','_self')</script>";
}
?>
