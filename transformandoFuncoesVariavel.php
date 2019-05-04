<?php 

include_once 'conexao.php';

include_once 'funcoesProjeto.php';

$sql = "SELECT peso, altura, sexo FROM a_antropometrica INNER JOIN cliente where ID_CLIENTE= 15";

$result = mysqli_query($con, $sql);

$row = mysqli_fetch_array($result);

$PESO = $row[0];
$DT_NASCIMENTO = $row[1];
$SEXO = $row[2];


$tmb = tmb($PESO,$DT_NASCIMENTO,$SEXO);

?>