<?php
define("azul", "\033[34m");
define("vermelho", "\033[31m");
define("verde", "\033[32m");
define("amarelo", "\033[1;33m");
define("roxo", "\033[0;35m");
define("padrao", "\033[0m");

/* Desenvolva um programa que receba o nome completo de um passageiro e devolva no formato para uma passagem aérea:

Por exemplo Joao Silva Soares, resultaria em SOARES/Joao */

// popen('cls','w'); APAGAR O PROMPT DE COMANDO

// $nomeCompleto = readline(verde . "Digite seu nome Completo: " . padrao);


$passageiro;
$parar = false;
$acent;
$passageiros = 0;
$acentos = [
    ['x', ' ', ' ', ' '],
    ['x', ' ', ' ', ' '],
    [' ', ' ', ' ', ' '],
    [' ', ' ', 'X', ' '],
    [' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' ']
];

function tratarString($nome)
{
    global $passageiro;
    $nomeCompleto = explode(" ", $nome);

    $passageiro = strtoupper($nomeCompleto[count($nomeCompleto) - 1]) . "/" . ucwords(strtolower($nomeCompleto[0]));
}

function escreve()
{
    global $acentos;
    $tela = <<< EOD
----------------------------------------------------------------------------------   
                        ______
                        \     \
        -=_=-            )  >> \
                          \     `----------------------------------...
                           \        ° ° ° ° ° ° ° ° ° ° ° ° °     |___\
                            \..               TECO TECO                )
                               `------------'     _     '____________./
                            -=_=-          ))          ))
                                              \________/
---------------------------------------------------------------------------------                        
                                 A    B           C     D\n
EOD;
echo $tela;
    for ($i = 0; $i < 15; $i++) {
        if($i > 8){
            echo "                            " . $i + 1 . "  [{$acentos[$i][0]}]  [{$acentos[$i][1]}]         [{$acentos[$i][2]}]   [{$acentos[$i][3]}]\n";
        }else{
            echo "                            " . $i + 1 . "   [{$acentos[$i][0]}]  [{$acentos[$i][1]}]         [{$acentos[$i][2]}]   [{$acentos[$i][3]}]\n";
        }
    }
}

echo "--------------------------------------------------------------------------------\n ";


function validaAcento($escolha)
{
    global $acent;
    $stop = false;
    do {
        $acento = str_split($escolha);
        count($acento) > 1 ? $linha = $acento[1] . $acento[2] - 1 : $linha = $acento[1] - 1;
        if (($acento[0] == 'A' || $acento[0] == 'B' || $acento[0] == 'C' || $acento[0] == 'D') && $linha < 15) {
            if ($acento[0] == 'A') {
                $coluna = 1;
            } elseif ($acento[0] == 'B') {
                $coluna = 2;
            } elseif ($acento[0] == 'C') {
                $coluna = 3;
            } else {
                $coluna = 4;
            }
            $acent = $escolha;
            verifica_ePreencheAcento($linha, $coluna);
            $stop = true;
        }
        if (count($acento) > 3 || $stop == false) {
            echo "\nO acento escolhido não existe \n";
            $escolha = strtoupper(readline("Digite novamente: "));
        }
    } while ($stop == false);
}

function verifica_ePreencheAcento($linha, $coluna)
{
    global $acentos;
    global $passageiros;
    if ($acentos[$linha][$coluna] == " ") {
        $acentos[$linha][$coluna] = "X";
        $passageiros++;
        confirmaAcento();
    } else {
        echo "Infelizmente esse acento já está reservado";
        validaAcento(strtoupper(readline("Escolha outro acento: ")));
    }
}

function confirmaAcento()
{
    global $acent;
    global $passageiro;
    echo <<< CONFIRMA
                          ----------------------
                              T E C O   T E C O
                              T  I  C  K  E  T
                              
                                    --!--
                            --.-----( . )-----.--
                              °               °
                        
                            PASSAGEIRO: $passageiro
                            ACENTO: $acent
                              BOA VIAGEM!!!
    --------------------------------------------------------------------------------\n
    CONFIRMA;
}

function parar($validacao)
{
    global $parar;
    if ($validacao == 'S') {
        $parar = true;
    } else {
        $parar = false;
    }
}

/*  do{
    echo $tela;
    tratarString(readline("Digite seu nome: "));
    validaAcento(strtoupper(readline("Escolha um dos acentos acima: ")));
    parar(strtoupper(readline("Deseja parar: (S/N)")));
}while($parar == false); */

echo escreve();
