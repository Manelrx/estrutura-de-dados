<?php 
{
    define("azul", "\033[34m");
    define("vermelho", "\033[31m");
    define("verde", "\033[32m");
    define("amarelo", "\033[1;33m");
    define("roxo", "\033[0;35m");
    define("padrao", "\033[0m");
}

$player1;
$player2;
$ganhador = false;
$continuarJogo;
$tabuleiro = [
    ['1', '2', '3'],
    ['4', '5', '6'],
    ['7', '8', '9']
];


function jogadores($player)
{
    global $player1;
    global $player2;
    if ($player == "X" || $player == "x") {
        $player1 = "X";
        $player2 = "O";
    } else {
        $player1 = "O";
        $player2 = "X";
    }
}

function continuar()
{
    global $continuarJogo;
    global $tabuleiro;
    $continuar = readline("Deseja continuar: S/N ");
    if ($continuar == 'S' || $continuar == 's') {
        $continuarJogo = true;
        zeraTabuleiro();
    } else {
        echo "\nObrigado por Jogar!!!";
        $continuarJogo = false;
    }
}

function vezDeJogar($numero)
{
    global $player1;
    global $player2;
    if (($numero % 2) == 0) {
        return $player1;
    } else {
        return $player2;
    }
}


//exibe o tabuleiro
function exibirTabuleiro()
{
    global $tabuleiro;
    echo $tabuleiro[0][0] . padrao . ' | ' . $tabuleiro[0][1] . padrao . ' | ' . $tabuleiro[0][2] . padrao . "\n";
    echo $tabuleiro[1][0] . padrao . ' | ' . $tabuleiro[1][1] . padrao . ' | ' . $tabuleiro[1][2] . padrao . "\n";
    echo $tabuleiro[2][0] . padrao . ' | ' . $tabuleiro[2][1] . padrao . ' | ' . $tabuleiro[2][2] . padrao . "\n";
    echo "\n";
}
//cria o tabuleiro
function zeraTabuleiro()
{
    global $tabuleiro;
    $tabuleiro = [
        ['1', '2', '3'],
        ['4', '5', '6'],
        ['7', '8', '9']
    ];
}

function preencherTabela($localEscolhido, $player)
{
    $parar = false;
    if ($player == 'X' || $player == 'x') {
        $player = verde . $player;
    } else {
        $player = amarelo . $player;
    }
    do {
        global $tabuleiro;
        switch ($localEscolhido) {
            case 1:
                if ($tabuleiro[0][0] == '1') {
                    $tabuleiro[0][0] = $player;
                    $parar = true;
                    break;
                } else {
                    break;
                }
            case 2:
                if ($tabuleiro[0][1] == '2') {
                    $tabuleiro[0][1] = $player;
                    $parar = true;
                    break;
                } else {
                    break;
                }
            case 3:
                if ($tabuleiro[0][2] == '3') {
                    $tabuleiro[0][2] = $player;
                    $parar = true;
                    break;
                } else {
                    break;
                }
            case 4:
                if ($tabuleiro[1][0] == '4') {
                    $tabuleiro[1][0] = $player;
                    $parar = true;
                    break;
                } else {
                    break;
                }
            case 5:
                if ($tabuleiro[1][1] == '5') {
                    $tabuleiro[1][1] = $player;
                    $parar = true;
                    break;
                } else {
                    break;
                }
            case 6:
                if ($tabuleiro[1][2] == '6') {
                    $tabuleiro[1][2] = $player;
                    $parar = true;
                    break;
                } else {
                    break;
                }
            case 7:
                if ($tabuleiro[2][0] == '7') {
                    $tabuleiro[2][0] = $player;
                    $parar = true;
                    break;
                } else {
                    break;
                }
            case 8:
                if ($tabuleiro[2][1] == '8') {
                    $tabuleiro[2][1] = $player;
                    $parar = true;
                    break;
                } else {
                    break;
                }
            case 9:
                if ($tabuleiro[2][2] == '9') {
                    $tabuleiro[2][2] = $player;
                    $parar = true;
                    break;
                } else {
                    break;
                }
        }
        if($parar == false){
        echo vermelho . " $localEscolhido já foi escolhido" . padrao."\n";
        exibirTabuleiro();
        $localEscolhido = readline("Escolha outro: ");
        }
    } while ($parar == false);
}

function verificaGanhador($player)
{
    global $tabuleiro;
    if (
        $tabuleiro[0][0] == $player  && $tabuleiro[0][1] == $player  && $tabuleiro[0][2] == $player ||
        $tabuleiro[1][0] == $player  && $tabuleiro[1][1] == $player  && $tabuleiro[1][2] == $player ||
        $tabuleiro[2][0] == $player  && $tabuleiro[2][1] == $player  && $tabuleiro[2][2] == $player ||
        $tabuleiro[0][0] == $player  && $tabuleiro[1][1] == $player  && $tabuleiro[2][2] == $player ||
        $tabuleiro[0][2] == $player  && $tabuleiro[1][1] == $player  && $tabuleiro[2][0] == $player ||
        $tabuleiro[0][0] == $player  && $tabuleiro[1][0] == $player  && $tabuleiro[2][0] == $player ||
        $tabuleiro[0][1] == $player  && $tabuleiro[1][1] == $player  && $tabuleiro[2][1] == $player ||
        $tabuleiro[0][2] == $player  && $tabuleiro[1][2] == $player  && $tabuleiro[2][2] == $player

    ) {
        return true;
    }
    /* for ($i = 0; $i <= 2; $i++) {
        for ($j = 0; $j <= 2; $j++) {
            if ($tabuleiro[$i][$j] == $player) {
            }
            if ($tabuleiro[$j][$i]) {
            }
            if ($i == $j) {
                if ($tabuleiro[$i][$j] == $player) {
                }
            }
        }
    } */
}



do {

    jogadores(readline("Deseja ser X ou O: "));
    for ($i = 0; $i < 9 || $ganhador == true; $i++) {
        global $ganhador;
        exibirTabuleiro();
        preencherTabela(readline(vezDeJogar($i) . " em qual linha deseja jogar: "), vezDeJogar($i));
        if ($i >= 4) {
            if (verificaGanhador(vezDeJogar($i)) == true) {
                echo 'Parabens jogador ' . vezDeJogar($i) . ' você ganhou o jogo';
                break;
            } elseif ($i == 8) {
                echo amarelo.'Empate!!!!!!!'. padrao."\n";
            }
        }
    }
    continuar();
} while ($continuarJogo == true);
