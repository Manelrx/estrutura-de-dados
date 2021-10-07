<?php
$celulares = array();
$celularRepitido = array();

function recebeCelulares()
{
    global $celulares;
    for ($i = 0; $i < 10; $i++) {
        $celular = strtolower(readline("Digite o modelelo do " .  $i+1 . "º celular: "));
        array_push($celulares, $celular);
    }
    procuraDuplicidade();
}

function procuraDuplicidade()
{
    global $celularRepitido;
    global $celulares;
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++) {
            if ($i != $j) {
                if ($celulares[$i] === $celulares[$j]) {
                    array_push($celularRepitido, $celulares[$i]);
                    $celulares[$i] = strtoupper($celularRepitido[count($celularRepitido) - 1]);
                }
            }
        }
    }
}

recebeCelulares();
if ($celularRepitido ==  null) {
    echo "Não tem celulares repitidos";
} else {
    echo "Os valores repetidos são: ";
    foreach ($celularRepitido as $value) {
        echo "$value ";
    }
}
