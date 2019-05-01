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
