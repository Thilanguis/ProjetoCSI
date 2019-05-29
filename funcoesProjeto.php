<?php 
function convertendoData ($dataNascimento){
    $dataNascimento = strtotime ($dataNascimento);
    return $dataNascimento;
}
?>

<?php 
function trataNome ($nome){

$nome = strtolower ($nome);
$nome = ucwords ($nome);

return $nome;
}
?>


<?php
    
function trataTelefone($telefone)
{
    $formatedPhone = preg_replace('/[^0-9]/', '', $telefone);
    $matches = [];
    preg_match('/^([0-9]{2})([0-9]{4,5})([0-9]{4})$/', $formatedPhone, $matches);
    if ($matches) {
        return '('.$matches[1].') '.$matches[2].'-'.$matches[3];
    }

    return $telefone; 
}
?>

<?php
function formatarCPF($cpf)
{
  if (strlen(preg_replace("/\D/", '', $cpf)) === 11) {
    $response = preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cpf);
  } else {
    $response = preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cpf);
  }

  return $response;
}
?>
