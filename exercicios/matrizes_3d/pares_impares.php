<?php {
    define("azul", "\033[34m");
    define("vermelho", "\033[31m");
    define("verde", "\033[32m");
    define("amarelo", "\033[1;33m");
    define("roxo", "\033[0;35m");
    define("padrao", "\033[0m");
}
/* Instruções
1) Elabore um programa que receba 18 valores distribuídos por 2 páginas com uma matriz 3x3 em cada.
Os valores deverão estar entre 1 e 100 validados por uma função.
Ao final separe os valores em dois vetores (unidimensional) par e ímpar.
Encontre a média de todos os valores ímpares informados.
Encontre a média de todos os valores pares informados.

1 2 3 4 5 6
1 2 3 4 5 6
1 2 3 4 5 6
 */
// entrada

// processamento 


//saida
$sair = false;
$contaNumeros = 1;
$impars = array();
$pars = array();
$valida = false;
$baseDeDados = [
    [
        ['', '', ''],
        ['', '', ''],
        ['', '', ''],
    ],
    [
        ['', '', ''],
        ['', '', ''],
        ['', '', ''],
    ]
];

function ValidaNum($i)
{
    global $contaNumeros;
    global $valida;

    do {
        $num = readline("Digite o $contaNumeros número da " . $i + 1 . "ª pagina : ");
        if (is_numeric($num) == true && $num > 0 && $num <= 100) {
            $valida = true;
        } else {
            if (is_numeric($num) == false) {
                echo vermelho . "Não é número \n" . padrao;
            } elseif ($num <= 0) {
                echo vermelho . "ERRO!!!!! Número menor que 1 \n" . padrao;
            } elseif ($num > 100) {
                echo vermelho . "ERRO!!!!!! Número maior que 100\n" . padrao;
            }
            $valida = false;
        }
    } while ($valida == false);
    if ($contaNumeros == 9) {
        $contaNumeros = 1;
    } else {
        $contaNumeros++;
    }
    return $num;
}

function recebeNumeros()
{
    global $baseDeDados;
    for ($i = 0; $i < 2; $i++) {
        for ($j = 0; $j < 3; $j++) {
            for ($k = 0; $k < 3; $k++) {
                $baseDeDados[$i][$j][$k] = ValidaNum($i);
            }
        }
    }
}

function separaNum()
{
    global $impars;
    global $pars;
    global $baseDeDados;
    for ($i = 0; $i < 2; $i++) {
        for ($j = 0; $j < 3; $j++) {
            for ($k = 0; $k < 3; $k++) {
                if (($baseDeDados[$i][$j][$k] % 2) == 0) {
                    array_push($pars, $baseDeDados[$i][$j][$k]);
                } else {
                    array_push($impars, $baseDeDados[$i][$j][$k]);
                }
            }
        }
    }
}

function imprimeImpar()
{
    $soma = 0;
    global $impars;
    echo "\n_________________________\n";
    echo " Os números Impares são: " . azul;
    if (count($impars) == 0) {
        echo (vermelho . 'Não tem números impars' . padrao);
    } else {
        for ($i = 0; $i < count($impars); $i++) {
            if ($i == count($impars) - 1) {
                echo $impars[$i] . "\n";
                $soma += $impars[$i];
            } else {
                echo $impars[$i] . ', ';
                $soma += $impars[$i];
            }
        }
        echo padrao . "A média dos números Impares é: " . padrao . $soma / count($impars) . vermelho . "\n";
    }
}

function imprimePar()
{
    $soma = 0;
    global $pars;

    echo "\n_________________________\n";
    echo "Os números Pares são: " . verde;
    if (count($pars) == 0) {
        echo (vermelho . 'Não tem números pars' . padrao);
    } else {
        for ($i = 0; $i < count($pars); $i++) {
            if ($i == count($pars) - 1) {
                echo $pars[$i] . "\n";
                $soma += $pars[$i];
            } else {
                echo $pars[$i] . ', ';
                $soma += $pars[$i];
            }
        }
        echo padrao . "A média dos números pares é: " . vermelho . $soma / count($pars) . padrao . "\n";
    }
}

function sair($validacao)
{
    global $sair;
    if ($validacao == 'S' || $validacao == 's') {
        $sair = true;
    } else {
        $sair = false;
    }
}

do {
    recebeNumeros();
    separaNum();
    imprimePar();
    imprimeImpar();
    sair(readline(roxo . "Deseja Sair: S/N: " . padrao));
} while ($sair == false);
