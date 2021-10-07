<?php
define("azul", "\033[34m");
define("vermelho", "\033[31m");
define("verde", "\033[32m");
define("amarelo", "\033[1;33m");
define("roxo", "\033[0;35m");
define("padrao", "\033[0m");
$lista = array();


function escreveLista()
{
    $teste = "%16.50s";
    global $lista;
    popen('cls', 'w');
    echo "-------------------------*\n";
    foreach ($lista as $value) {
        printf($teste, "$value\n");
    }
    echo "-------------------------*\n";
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

function recebeNome()
{
    global $lista;
    for ($i = 0; $i < 10; $i++) {
        $nome = readline("Digite o " . $i + 1 . "º nome: ");
        array_push($lista, validaNome($nome));
        escreveLista();
    }
}

recebeNome();
