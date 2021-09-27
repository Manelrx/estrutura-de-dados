<?php {
    define("azul", "\033[34m");
    define("vermelho", "\033[31m");
    define("verde", "\033[32m");
    define("amarelo", "\033[1;33m");
    define("roxo", "\033[0;35m");
    define("padrao", "\033[0m");
}
/* ) Elabore um programa que receba 18 nomes (alunos) distribuídos por 2 salas com uma matriz 3x3
em cada.
Permita ao usuário informar um nome para pesquisar nas matrizes, deverão serem retornadas
as duas matrizes(salas) originais (desenhadas lado a lado) com as posições onde estão o valor
informado na cor Amarela.
Deverão ser impressas as posições [x,y,z] onde foram encontrados o nome e quantas vezes aparece.

diego maria joao aucides tereza pedro
diego maria joao aucides tereza pedro
diego maria joao aucides tereza pedro

- Informe o nome para busca: Pedro
*pedro* maria joao aucides tereza *pedro*
diego maria joao aucides tereza *pedro*
diego maria joao aucides tereza *pedro*

- Pedro foi encontrado na sala 1 no índice:
[0][0][0]

- Pedro foi encontrado na sala 2 no índice:
[1][0][2]
[1][1][2]
[1][2][2]

- O nome Pedro foi encontrado 4 vezes nas duas salas. */

$contaAlunos = 1;
$guardaIndice1 = array();
$guardaIndice2 = array();
$salas = [
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

function recebeAlunos()
{
    global $contaAlunos;
    global $salas;
    for ($i = 0; $i < 2; $i++) {
        for ($j = 0; $j < 3; $j++) {
            for ($k = 0; $k < 3; $k++) {
                $salas[$i][$j][$k] = ucwords(strtolower(readline("Digite o nome do $contaAlunos aluno da " . $i + 1 . "ª sala: ")));
                if ($contaAlunos == 9) {
                    $contaAlunos = 1;
                } else {
                    $contaAlunos++;
                }
            }
        }
    }
}

function guardaIndices($i,$j,$k)
{
    global $guardaIndice1;
    global $guardaIndice2;
    if($i == 0){
        array_push($guardaIndice1,);
    }

}

function pesquisaNome($nome)
{
    global $salas;
    $contaNome = 0;
    for ($i = 0; $i < 2; $i++) {
        for ($j = 0; $j < 3; $j++) {
            for ($k = 0; $k < 3; $k++) {
                if ($salas[$i][$j][$k] == $nome) {
                    if ($i == 0) {
                        array_push($guardaIndice1, "[$i][$j][$k]");
                        $salas[$i][$j][$k] = amarelo . $nome;
                        $contaNome++;
                    } else {
                        array_push($guardaIndice2, "[$i][$j][$k]");
                        $salas[$i][$j][$k] = amarelo . $nome;
                        $contaNome++;
                    }
                }
            }
        }
    }
    echo '$nome foi encontrado na sala 1 no índice: ';
    for ($z = 0; $z < count($guardaIndice1); $z++) {
        echo $guardaIndice1[$z] . '\n';
    }
}

function imprimeSalas()
{
    global $salas;
    $espaco = "        ";
    echo $salas[0][0][0] . padrao . ' | ' . $salas[0][0][1] . padrao . ' | ' . $salas[0][0][2] . $espaco . $salas[1][0][0] . padrao . ' | ' . $salas[1][0][1] . padrao . ' | ' . $salas[1][0][2] . padrao . "\n";
    echo $salas[0][1][0] . padrao . ' | ' . $salas[0][1][1] . padrao . ' | ' . $salas[0][1][2] . $espaco . $salas[1][1][0] . padrao . ' | ' . $salas[1][1][1] . padrao . ' | ' . $salas[1][1][2] . padrao . "\n";
    echo $salas[0][2][0] . padrao . ' | ' . $salas[0][2][1] . padrao . ' | ' . $salas[0][2][2] . $espaco . $salas[1][2][0] . padrao . ' | ' . $salas[1][2][1] . padrao . ' | ' . $salas[1][2][2] . padrao . "\n";
}

imprimeSalas();

/* pesquisaNome(ucwords(strtolower(readline('Digite o nome que deseja pesquisar: '))));
 */