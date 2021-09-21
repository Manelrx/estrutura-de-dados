<?php
define("azul", "\033[34m");
define("vermelho", "\033[31m");
define("verde", "\033[32m");
define("amarelo", "\033[1;33m");
define("roxo", "\033[0;35m");
define("padrao", "\033[0m");


$teste = padrao. 'hoje';

$teste = azul.$teste;

echo $teste;
