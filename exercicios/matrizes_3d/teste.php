<?php
include('recebeNome.php');
include('pares_impares.php');
$sair;
do{
echo "1 - Separa números impares e pares";
echo "2 - Localiza nomes em 2 salas";
$opcao = readline("Digite a opção desejada: ");

switch ($opcao){
    case 1:
        pares_impares();
    case 2:
        recebeNome();
    default:
    echo vermelho . "Opção invalida" . padrao;
}

sair(readline(roxo . "Deseja Continuar: S/N: " . padrao));

}while($sair != true);


function sair($validacao)
{
    global $sair;
    if ($validacao == 'N' || $validacao == 'n') {
        $sair = true;
    } else {
        $sair = false;
    }
}
