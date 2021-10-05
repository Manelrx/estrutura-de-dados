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

diego maria joao | aucides tereza pedro
diego maria joao | aucides tereza pedro
diego maria joao | aucides tereza pedro

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

function CriaArray(){
    global $guardaIndice1;
    global $guardaIndice2;
    $guardaIndice1 = array();
    $guardaIndice2 = array();
}

function recebe_procuraAlunos($recebe, $nome)
{
    $contaAlunos = 1;
    global $salas;
    global $guardaIndice1;
    global $guardaIndice2;

    for ($i = 0; $i < 2; $i++) {
        for ($j = 0; $j < 3; $j++) {
            for ($k = 0; $k < 3; $k++) {
                if ($recebe == true) {
                    $salas[$i][$j][$k] = validaNome(readline("Digite o nome do " . verde . $contaAlunos . "°" . padrao . " aluno da " . roxo . $i + 1 . "ª" . padrao . " sala:"));
                    $contaAlunos == 9 ? $contaAlunos = 1 : $contaAlunos++;
                } else {
                    if ($salas[$i][$j][$k] == $nome) {
                        $salas[$i][$j][$k] = amarelo . $nome;
                        $i == 0 ? array_push($guardaIndice1, "[$i][$j][$k]") : array_push($guardaIndice2, "[$i][$j][$k]");
                    }
                }
            }
        }
    }
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

function informaIndices($indice, $i)
{
    global $guardaIndice1;
    global $guardaIndice2;
    global $nomeProcurado;
    if (count($indice) != null) {
        echo roxo . "$nomeProcurado foi encontrado " . count($indice) . " vezes na sala $i no indice: \n ";
        for ($i = 0; $i < count($indice); $i++) {
            echo amarelo . $indice[$i] . "\n";
        }
    } else {
        echo vermelho . "$nomeProcurado não foi encontrado na sala $i \n";
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

function recebeNome()
{
    global $parar;
    global $nomeProcurado;
    global $guardaIndice1;
    global $guardaIndice2;
    recebe_procuraAlunos(true, '');
    do {
        echo azul . "Escolha uma opção: \n" .  padrao;
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
                recebe_procuraAlunos(false, $nomeProcurado = validaNome(readline(verde . "Digite o nome que deseja pesquisar: " . padrao)));
                informaIndices($guardaIndice1, 1);
                informaIndices($guardaIndice2, 2);
                CriaArray();
                break;
            case 3:
                recebe_procuraAlunos(true, '');
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

recebeNome();
