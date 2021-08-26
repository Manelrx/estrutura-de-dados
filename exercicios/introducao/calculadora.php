<?php

//1) Elabore uma calculadora onde o usuário informará dois números e uma operação (+, -, *, /) e retorne o resultado da operação.
$parar = false;
define("padrao","\033[0m");
define("vermelho","\033[31m");
define("verde","\033[33m");
define("azul","\033[34m");

do{
    $validaNumeros = false;
    $opcao = readline(verde. '1-somar \n 2- Subtrair \n 3-Multiplicar \n 4-Dividir \n 0-Sair \n Qual operação deseja realizar: ');
    while($validaNumeros == false){
        $primeiroValor = readline(vermelho. 'Informe o primeiro valor: ');
        $segundoValor = readline(azul. 'Informe o segundo valor: ');
        if($opcao == 4 and ($primeiroValor == 0 or $segundoValor == 0)){
            echo 'não é possivel subtrair por 0 \n ';
        }else{
          $opcao = true;
          switch($opcao){
            case 0: 
                echo "Até a proxima";
                $parar = false;
                break;
            case 1:
                echo padrao. "$primeiroValor \+ $segundoValor = $primeiroValor + $segundoValor\n";
                break;
            case 2:
                echo azul. "$primeiroValor \- $segundoValor = $primeiroValor - $segundoValor \n";
                break;
            case 3: 
                echo vermelho. "$primeiroValor vezes $segundoValor = $primeiroValor * $segundoValor \n";
                break;
            case 4: 
                echo verde. "$primeiroValor dividido $segundoValor = $primeiroValor / $segundoValor \n";
                break;
            }       
        }
    }   
}while($parar == false);

?>