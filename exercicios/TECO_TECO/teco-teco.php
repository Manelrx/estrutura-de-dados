<?php
include('Relacao.php');

define("AZUL", "\033[34m");
define("VERMELHO", "\033[31m");
define("VERDE", "\033[32m");
define("AMARELO", "\033[1;33m");
define("ROXO", "\033[0;35m");
define("PADRAO", "\033[0m");

/* Desenvolva um programa que receba o nome completo de um passageiro e devolva no formato para uma passagem aérea:

Por exemplo Joao Silva Soares, resultaria em SOARES/Joao */

// popen('cls','w'); APAGAR O PROMPT DE COMANDO

// $nomeCompleto = readline(verde . "Digite seu nome Completo: " . padrao);

$passageiro;
$parar = false;
$acent;
$qntPassageiros = 0;
$acentos = [
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
    [' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' ']
];

function tratarString($nome)
{
    global $passageiro;
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
            $nomeCompleto = explode(" ", $nome);
            $passageiro = strtoupper($nomeCompleto[count($nomeCompleto) - 1]) . "/" . ucwords(strtolower($nomeCompleto[0]));
            $validado = true;
        }
    } while ($validado == false);
}

function tela()
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
        if ($i > 8) {
            echo "                            " . $i + 1 . "  [{$acentos[$i][0]}]  [{$acentos[$i][1]}]         [{$acentos[$i][2]}]   [{$acentos[$i][3]}]\n";
        } else {
            echo "                            " . $i + 1 . "   [{$acentos[$i][0]}]  [{$acentos[$i][1]}]         [{$acentos[$i][2]}]   [{$acentos[$i][3]}]\n";
        }
    }
    echo "--------------------------------------------------------------------------------\n ";
}

function validaAcento($escolha)
{
    global $acent;
    $stop = false;
    do {
        $acento = str_split($escolha);
        count($acento) > 2 ? $linha = ($acento[1] . $acento[2]) - 1 : $linha = $acento[1] - 1;
        if (($acento[0] == 'A' || $acento[0] == 'B' || $acento[0] == 'C' || $acento[0] == 'D') && $linha < 15) {
            if ($acento[0] == 'A') {
                $coluna = 0;
            } elseif ($acento[0] == 'B') {
                $coluna = 1;
            } elseif ($acento[0] == 'C') {
                $coluna = 2;
            } else {
                $coluna = 3;
            }
            $acent = $escolha;
            verifica_ePreencheAcento($linha, $coluna);
            $stop = true;
        }
        if (count($acento) > 3 || $stop == false) {
            echo "\nO acento escolhido não existe \n";
            $escolha = strtoupper(readline(VERMELHO . "EX: A10   Digite novamente: " . PADRAO));
        }
    } while ($stop == false);
}

function verifica_ePreencheAcento($linha, $coluna)
{
    global $acentos;
    global $qntPassageiros;
    if ($acentos[$linha][$coluna] == " ") {
        $acentos[$linha][$coluna] = VERDE . "X" . PADRAO;
        $qntPassageiros++;
        confirmaAcento();
    } else {
        echo VERMELHO . "Infelizmente esse acento já está reservado\n" . PADRAO;
        validaAcento(strtoupper(readline(AZUL . "Escolha outro acento: " . PADRAO)));
    }
}

function confirmaAcento()
{
    global $acent;
    global $passageiro;

    popen('cls', 'w');
    echo VERDE . <<< CONFIRMA
    --------------------------------------------------------------------------------\n
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
    CONFIRMA . PADRAO;
    recebeMat_Nome($passageiro, $acent);
}

function parar($validacao)
{
    global $parar;
    if ($validacao == 'S') {
        escreveLista();
        echo (AZUL . 'Obrigado por escolher a TECO - TECO AIRLINES!' . PADRAO);
        $parar = true;
    } else {
        $parar = false;
    }
}

do {
    tela();
    tratarString(readline(AZUL . "Informe o nome Completo: " . PADRAO));
    validaAcento(strtoupper(readline(AZUL . "Informe a poltrona desejada: " . PADRAO)));
    if ($qntPassageiros > 1) {
        echo VERDE . "STATUS DO VOO: CONFIRMADO!!" . PADRAO;
        parar(strtoupper(readline("\nDeseja iniciar o voo: (S/N)")));
    } else {
        echo AMARELO . "STATUS DO VOO: AGUARDANDO CONFIRMAÇÃO!\n" . PADRAO;
    }
} while ($parar == false);
