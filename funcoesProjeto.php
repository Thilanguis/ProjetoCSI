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

// conversor de data para inteiro 
function quebra_data($data,$tipo){
    $d = explode("-",$data);
    switch ($tipo){
        case 'a':
            $d = intval($d[0]);
            break;
        case 'm':
            $d = intval($d[1]);
            break;
        case 'd':
            $d = intval($d[2]);
            break;
    }
    
    return $d;
}
// calculador de idade
function idade($nascimento){
    if (date('m') >= quebra_data($nascimento,'m')){
		if (date('d') >= quebra_data($nascimento,'d')){       
           $nacimento = quebra_data($nascimento,'a');
	   	   $nascimento = intval($nascimento);
           $idade = date('Y') - $nascimento; 
		}
	    elseif(date('d') < quebra_data($nascimento,'d')){
	       $nascimento = quebra_data($nascimento,'a');
           $idade = date('Y') - $nascimento -1;
	    }
    } 
    else {
        $nascimento = quebra_data($nascimento,'a');
        $idade = date('Y') - $nascimento - 1;
    }
    return $idade;
}
function imc($peso,$altura){
	$imc = $peso/($altura*$altura);
	$imc =  number_format($imc, 2, '.', '');
	return $imc;
}
//indice de massa corporal
function class_imc($peso,$altura,$nascimento){
$idade = idade($nascimento);
$imc = imc($peso,$altura);
	if($idade >= 60){
		if($imc < 22.00){
		return "Magreza";
		}
		if($imc >= 22.00 && $imc <= 27.00){
		return "Eutofia";
		}
		if($imc > 27.00){
		return "Excesso de Peso";
		}
	}
	else{
		if($imc < 16.00){
		return "Magreza Grau 3";
		}
		if($imc >= 16.00 && $imc < 17.00){
		return "Magreza Grau 2";
		}
		if($imc >= 17.00 && $imc < 18.50){
		return "Magreza Grau 1";
		}
		if($imc >= 18.50 && $imc < 25.00){
		return "Eutofia";
		}
		if($imc >= 25.00 && $imc < 30.00){
		return "Pre-Obesidade";
		}
		if($imc >= 30.00 && $imc < 35.00){
		return "Obeidade Grau 1";
		}
		if($imc >= 35.00 && $imc < 40.00){
		return "Obeidade Grau 2";
		}
		if($imc > 40.00){
		return "Obeidade Grau 3";
		}
	}
}
// taxa metabolica bassal
function tmb($peso,$nascimento,$sexo){
	$idade = idade($nascimento);
	if($sexo == "Masculino" or $sexo == "masculino"){
		if($idade >= 10 && $idade < 18){
		return $tmb = (17.5 * $peso)+651;
		}
		if($idade >= 18 && $idade < 30){
		return $tmb = (15.3 * $peso) + 679;
		}
		if($idade >= 30 && $idade < 60){
		return $tmb = (11.6 * $peso) + 879;
		}
		if($idade >= 60){
		return $tmb = (13.5 * $peso) + 487;
		}
	}
	if($sexo == "Feminino" or "feminino"){
		if($idade >= 10 && $idade < 18){
		return $tmb = (12.2 * $peso)+ 746;
		}
		if($idade >= 18 && $idade < 30){
		return $tmb = (14.7 * $peso) + 496;
		}
		if($idade >= 30 && $idade < 60){
		return $tmb = (8.5 * $peso) + 829;
		}
		if($idade >= 60){
		return $tmb = (10.5 * $peso) + 596;
		}
	
	}
	
}
// nivel de atividade fisica
function naf ($sexo,$atividade,$horas){
	$h = explode(":",$horas);
	$hr = $h[0];
	$mn = $h[1];
	$horas = intval($hr) + (intval($mn)/60);
	if($sexo == 'feminino'){
		switch($atividade){
		case 'C. ao leito':
			$naf = 1.27;
			break;
		case 'leve':
			$naf = 1.56;
			break;
		case 'moderada':
			$naf = 1.64;
			break;
		case 'intensa':
			$naf = 1.82;
			break;
		case 'idoso':
			$naf = 1.52;
			break;
		}
	}
	if($sexo == 'masculino'){
		switch($atividade){
			case 'C. ao leito':
				$naf = 1.27;
				break;
			case 'leve':
				$naf = 1.55;
				break;
			case 'moderada':
				$naf = 1.78;
				break;
			case 'intensa':
				$naf = 2.1;
				break;
			case 'idoso':
				$naf = 1.51;
				break;
		}
	}	
	$naf = $naf*$horas;
	return $naf;
}
//valor energetico total
function vet($tmb,$naf){
	$vet = $tmb*$naf;
	return $vet;
}
//percentual de gordura
function PercentualGordura($sexo,$tricipital,$subescapular,$suprailiaca,$abdominal,$quadriceps){
	if($sexo == 'Masculino'){
		$gordura = ($tricipital+$subescapular+$suprailiaca+$abdominal)*0.153*5.783/100;
		
	}
	elseif($sexo == 'Feminino'){
		$gordura = ($tricipital+$subescapular+$suprailiaca+$abdominal+$quadriceps)*0.8*0.153+5.783/100;
	}
return $gordura;
}
?>
