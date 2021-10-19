<?php

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
?> 