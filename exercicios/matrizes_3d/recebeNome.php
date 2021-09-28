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
$parar = false;
$nomeProcurado;
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

    echo azul . "PREENCHA 9 ALUNOS EM CADA TURMA \n" . padrao;
    for ($i = 0; $i < 2; $i++) {
        for ($j = 0; $j < 3; $j++) {
            for ($k = 0; $k < 3; $k++) {
                $salas[$i][$j][$k] = validaNome(ucwords(strtolower(readline("Digite o nome do " . verde . $contaAlunos . "°" . padrao . " aluno da " . roxo . $i + 1 . "ª" . padrao . " sala:"))));
                if ($contaAlunos == 9) {
                    $contaAlunos = 1;
                } else {
                    $contaAlunos++;
                }
            }
        }
    }
}

function guardaIndices($i, $j, $k)
{
    global $guardaIndice1;
    global $guardaIndice2;
    if ($i == 0) {
        array_push($guardaIndice1, "[$i][$j][$k]");
    } elseif ($i == 1) {
        array_push($guardaIndice2, "[$i][$j][$k]");
    }
}

function informaIndices()
{
    global $nomeProcurado;
    global $guardaIndice1;
    global $guardaIndice2;
    if (count($guardaIndice1) > 0) {
        echo roxo ."$nomeProcurado foi encontrado " . count($guardaIndice1) . " vezes na sala 1 no indice: \n ";
        for ($i = 0; $i < count($guardaIndice1); $i++) {
            echo amarelo . $guardaIndice1[$i] . "\n";
        }
    } else {
        echo vermelho . "$nomeProcurado não foi encontrado na sala 1 \n";
    }
    if (count($guardaIndice2) > 0) {
        echo roxo . "$nomeProcurado foi encontrado " . count($guardaIndice2)  . " vezes na sala 2 no indice: \n ";
        for ($i = 0; $i < count($guardaIndice2); $i++) {
            echo amarelo . $guardaIndice2[$i] . "\n";
        }
    } else {
        echo vermelho ."$nomeProcurado não foi encontrado na sala 2 \n";
    }
}

function pesquisaNome($nome)
{
    global $salas;
    for ($i = 0; $i < 2; $i++) {
        for ($j = 0; $j < 3; $j++) {
            for ($k = 0; $k < 3; $k++) {
                if ($salas[$i][$j][$k] == $nome) {
                    $salas[$i][$j][$k] = amarelo . $nome;
                    guardaIndices($i, $j, $k);
                }
            }
        }
    }
    informaIndices();
}

function imprimeSalas()
{
    global $salas;
    $espaco = "        ";
    echo $salas[0][0][0] . padrao . ' | ' . $salas[0][0][1] . padrao . ' | ' . $salas[0][0][2] . $espaco . $salas[1][0][0] . padrao . ' | ' . $salas[1][0][1] . padrao . ' | ' . $salas[1][0][2] . padrao . "\n";
    echo $salas[0][1][0] . padrao . ' | ' . $salas[0][1][1] . padrao . ' | ' . $salas[0][1][2] . $espaco . $salas[1][1][0] . padrao . ' | ' . $salas[1][1][1] . padrao . ' | ' . $salas[1][1][2] . padrao . "\n";
    echo $salas[0][2][0] . padrao . ' | ' . $salas[0][2][1] . padrao . ' | ' . $salas[0][2][2] . $espaco . $salas[1][2][0] . padrao . ' | ' . $salas[1][2][1] . padrao . ' | ' . $salas[1][2][2] . padrao . "\n";
}

function validaNome($nome)
{
    $validado = false;
    do {
        if (is_numeric($nome) == false && $nome != "") {
            $nome = ucwords(strtolower($nome));
            $validado = true;
            return $nome;
        } elseif (is_numeric($nome) == true) {
            echo vermelho . "Não pode ser número. \n" . padrao;
        } elseif ($nome == "") {
            echo vermelho . "Não pode ser vazio. \n" . padrao;
        }
        if ($validado == false) {
            $nome = ucwords(strtolower(readline("Digite novamente: ")));
        }
    } while ($validado == false);
}

function programa()
{
    global $parar;
    global $nomeProcurado;
    recebeAlunos();
    do {
        echo verde . "1 " . padrao . "- Visualizar as salas \n";
        echo verde . "2 " . padrao . "- Pesquisar um aluno \n";
        echo verde . "3 " . padrao . "- Preencher uma nova sala \n";
        echo verde . "4 " . padrao . "- Sair\n";
        $opcao = readline("O que deseja fazer: " . padrao);
        switch ($opcao) {
            case 1:
                imprimeSalas();
                break;
            case 2:
                pesquisaNome($nomeProcurado = validaNome(ucwords(strtolower(readline(verde . "Digite o nome que deseja pesquisar: " . padrao)))));

                break;
            case 3:
                recebeAlunos();
                break;
            case 4:
                echo vermelho . " Até a proxima";
                $parar = true;
                break;
            default:
                echo (vermelho . "Essa opção não existe!, escolha novamente. \n" . padrao);
        }
    } while ($parar == false);
}

programa();
