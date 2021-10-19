<?php
define("AZUL", "\033[34m");
define("VERMELHO", "\033[31m");
define("VERDE", "\033[32m");
define("AMARELO", "\033[1;33m");
define("ROXO", "\033[0;35m");
define("PADRAO", "\033[0m");
$listaNomes = array();
$listaAcentos = array();


function escreveLista()
{
    
    $teste = "%5.20s |%5.3s\n";
    global $listaNomes, $listaAcentos;
    print_r($listaNomes);
    popen('cls', 'w');
    echo "-------------------------*\n";
    for ($i = 0; $i < count($listaNomes); $i++){
        printf($teste, $listaNomes[$i], $listaAcentos[$i]);
    }
    echo "-------------------------*\n";
}

function validaNome($nome)
{
    $validado = false;
    do {
        if (is_numeric($nome) || $nome == "") {
            if (is_numeric($nome) == true) {
                echo vermelho . "Não pode ser número. \n" . padrao;
            } else {
                echo vermelho . "Não pode ser vazio. \n" . padrao;
            }
            $nome = readline("Digite novamente: ");
        } else {
            return ucwords(strtolower($nome));
            $validado = true;
        }
    } while ($validado == false);
}

function recebeMat_Nome($acento, $nome)
{
    global $listaNomes, $listaAcentos;
    array_push($listaNomes, $nome);
    array_push($listaAcentos, $acento);
}

