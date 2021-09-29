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
$sair = false;
$contaNumeros = 1;
$impars = array();
$pars = array();
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
    $valida = false;

    do {
        $num = readline("Digite o $contaNumeros número da " . $i + 1 . "ª pagina : ");
        if (is_numeric($num) == true && $num > 0 && $num <= 100) {
            $contaNumeros == 9 ? $contaNumeros = 1 : $contaNumeros++;
            $valida = true;
        } else {
            if (is_numeric($num) == false) {
                echo vermelho . "Não é número \n" . padrao;
            } else {
                echo vermelho . "O número deve ser entre 1 e 100 \n" . padrao;
                $valida = false;
            }
        }
    } while ($valida == false);
    
    return $num;
}

function recebeNumeros()
{
    global $baseDeDados;
    global $pars;
    global $impars;
    for ($i = 0; $i < 2; $i++) {
        for ($j = 0; $j < 3; $j++) {
            for ($k = 0; $k < 3; $k++) {
                $baseDeDados[$i][$j][$k] = ValidaNum($i);
                $numero = $baseDeDados[$i][$j][$k];
                $numero % 2 == 0 ? array_push($pars, $numero) : array_push($impars, $numero);
            }
        }
    }
}

function imprimeImpar()
{
    $soma = 0;
    global $impars;

    echo "\n_________________________\n";
    if (count($impars) == 0) {
        echo (vermelho . 'Não tem números impars' . padrao);
    } else {
        $qntd_impares = count($impars);
        $media = array_sum($impars) / $qntd_impares;
        echo padrao . "A média dos números Impares é: " . vermelho . $media . padrao . "\n";
    }
}

function imprimePar()
{
    $soma = 0;
    global $pars;
    echo "\n_________________________\n";
    
    if (count($pars) == 0) {
        echo (vermelho . 'Não tem números pars' . padrao);
    } else {
        $qntd_pares = count($pars);
        $media = array_sum($pars)/$qntd_pares;
        echo padrao . "A média dos números pares é: " . vermelho . $media . padrao . "\n";
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

function pares_impares()
{
    global $sair;
    do {
        recebeNumeros();
        imprimePar();
        imprimeImpar();
        sair(readline(roxo . "Deseja Sair: S/N: " . padrao));
    } while ($sair == false);
}

pares_impares();
