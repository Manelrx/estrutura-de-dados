<?php {
    define("azul", "\033[34m");
    define("vermelho", "\033[31m");
    define("verde", "\033[32m");
    define("amarelo", "\033[1;33m");
    define("roxo", "\033[0;35m");
    define("padrao", "\033[0m");
}
//declaração de variaveis
$player1;
$player2;
$continuarJogo;
$tabuleiro = [
    ['1', '2', '3'],
    ['4', '5', '6'],
    ['7', '8', '9']
];

//recebe os jogadores em uma variavel global
function jogadores($player)
{
    global $player1;
    global $player2;
    if ($player == "X" || $player == "x") {
        $player1 = verde . "X";
        $player2 = amarelo . "O";
    } else {
        $player1 = amarelo . "O";
        $player2 = verde . "X";
    }
}
//verifica se quer continuar jogando
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
//verifica de quem é a vez de jogar, se aproveitando do for do programa
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
//cria um novo tabuleiro para começar o jogo novamente
function zeraTabuleiro()
{
    global $tabuleiro;
    $tabuleiro = [
        ['1', '2', '3'],
        ['4', '5', '6'],
        ['7', '8', '9']
    ];
}
//switch case para preencher os valores escolhidos, tendo uma estrutura de repetição para validar a escolha
function preencherTabela($localEscolhido, $player)
{
    $parar = false;
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
        if ($parar == false) {
            echo vermelho . " $localEscolhido já foi escolhido" . padrao . "\n";
            exibirTabuleiro();
            $localEscolhido = readline("Escolha outro: ");
        }
    } while ($parar == false);
}
//valida se algum dos jogadores ganhou o jogo com for e if obs. tentamos mudar a cor do vencedor mas não conseguimos 
function verificaGanhador($player)
{
    $ganhou = false;
    global $tabuleiro;
    for ($i = 0; $i <= 2; $i++) {
        if ($tabuleiro[$i][0] == $player  && $tabuleiro[$i][1] == $player  && $tabuleiro[$i][2] == $player) {
            for ($j = 0; $j <= 2; $j++) {
                $tabuleiro[$i][$j] = corVencedor($player);
            }

            $ganhou = true;
        }
        if ($tabuleiro[0][$i] == $player  && $tabuleiro[1][$i] == $player  && $tabuleiro[2][$i] == $player) {
            for ($j = 0; $j <= 2; $j++) {
                $tabuleiro[$j][$i] = corVencedor($player);
            }
            $ganhou = true;
        }

        if ($tabuleiro[0][0] == $player  && $tabuleiro[1][1] == $player  && $tabuleiro[2][2] == $player) {
            for ($j = 0; $j <= 2; $j++) {
                if ($i == $j) {
                    $tabuleiro[$i][$j] = corVencedor($player);
                }
            }
            $ganhou = true;
        }

        if ($tabuleiro[0][2] == $player  && $tabuleiro[1][1] == $player  && $tabuleiro[2][0] == $player) {
            $tabuleiro[0][2] = corVencedor($player);
            $tabuleiro[1][1] = corVencedor($player);
            $tabuleiro[2][0] = corVencedor($player);
            $ganhou = true;
        }
    }
    return $ganhou;
}

function corVencedor($player){
    if($player == amarelo . 'O'){
        return vermelho . "O";
    }else{
        return vermelho . "X";
    }
}

//programa
do {
    jogadores(readline("Deseja ser X ou O: "));
    for ($i = 0; $i < 9; $i++) {
        exibirTabuleiro();
        preencherTabela(readline(vezDeJogar($i) . padrao . " em qual linha deseja jogar: "), vezDeJogar($i));
        if ($i >= 4) {
            if (verificaGanhador(vezDeJogar($i)) == true) {
                echo 'Parabéns jogador ' . vezDeJogar($i) . " você ganhou o jogo" . padrao . "\n";
                exibirTabuleiro();
                break;
            } elseif ($i == 8) {
                echo amarelo . 'Empate!!!!!!!' . padrao . "\n";
            }
        }
    }
    continuar();
} while ($continuarJogo == true);
