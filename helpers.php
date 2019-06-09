<?php

    function dataFormat($data,$option){
    # Recebe uma data no formato Y/m/d e uma opção
    # de saída
        $strData = explode('-', $data);
        $strData = array(
            'dia'   => $strData[2],
            'mes'   => $strData[1],
            'ano'   => $strData[0],
            'data'  => $strData[2]."/".$strData[1]."/".$strData[0],                   
        );
        
        return $strData[$option];   
    }

    function verificaData(){
    # Verifica  se a data foi definida para exibir os clientes dessa data
        if(isset($_GET['inDataAgenda'])){
            return $_GET['inDataAgenda'];
        }else{
            return date('Y-m-d');
        }
    }

    function verificaVazio($vetor){
        foreach($vetor as $key => $value){
            if($value == ''){
                echo "Campo ".$key." está em branco!";
                return TRUE;
                break;
            }
        }
        return FALSE;
    }

?>