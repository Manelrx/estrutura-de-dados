<?php
define("AZUL", "\033[34m");
define("VERMELHO", "\033[31m");
define("VERDE", "\033[32m");
define("AMARELO", "\033[1;33m");
define("ROXO", "\033[0;35m");
define("PADRAO", "\033[0m");
$listaNomes = array("PASSAGEIROS");
$listaAcentos = array("ACENTOS");

function escreveLista()
{
    $mask = "| %-20.20s | %-10.7s\n";
    global $listaNomes, $listaAcentos;
    popen('cls', 'w');
    echo VERDE . "--------------------------------------------------------------------------------\n" . PADRAO;
    echo AZUL . "              L I S T A     D O S     P A S S A G E I R O S \n" . PADRAO;
    for ($i = 0; $i < count($listaAcentos); $i++){
        printf($mask, $listaNomes[$i], $listaAcentos[$i]);
    }
    echo VERDE . "--------------------------------------------------------------------------------\n" . PADRAO;
}

/* function localizaAcento($acento){
    global $listaAcentos, $listaNomes;
    for($i = 0; $i < count($listaAcentos); $i++){
        if ($acento == $listaAcentos[$i]){
            echo "O acento $acento foi reservado para o passageiro {$listaNomes[$i]} ";
        }
    }
} */

function recebeMat_Nome($nome, $acento)
{
    global $listaNomes, $listaAcentos;
    array_push($listaNomes, $nome);
    array_push($listaAcentos, $acento);
}

