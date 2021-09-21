<?php

//1) Elabore uma calculadora onde o usuário informará dois números e uma operação (+, -, *, /) e retorne o resultado da operação.
$finalizar = false;
define("padrao","\033[0m");
define("vermelho","\033[31m");
define("verde","\033[32m");
define("azul","\033[34m");

do{
    $validaDivisaoZero = false;
    
    $primeiroValor = readline(vermelho. "Informe o primeiro valor: ");
    $segundoValor = readline(azul. "Informe o segundo valor: ");
    echo verde. "[ +, -, *, /] \n";
    $opcao = readline("Qual operação deseja realizar: ");
       
        
    $validaDivisaoZero = true;
        switch($opcao){
        case '+':
            $res = $primeiroValor + $segundoValor;
            echo padrao."$primeiroValor + $segundoValor = $res \n";
        break;
        case '-': 
            $res = $primeiroValor - $segundoValor;
            echo azul. "$primeiroValor - $segundoValor = $res \n";
        break;
        case '*': 
            $res = $primeiroValor * $segundoValor;
            echo vermelho. "$primeiroValor vezes $segundoValor = $res \n";
            break;
        case '/': 
            if($segundoValor == 0){
                echo "não é possivel subtrair por 0 \n ";
                break;
            }else{
                $res = $primeiroValor / $segundoValor;
                echo verde. "$primeiroValor dividido $segundoValor = $res \n";
            break;
            }
        default:
            echo "Essa opção não existe, favor informe novamente \n";
        }   
        $continuar = readline("Deseja continuar: s/n ");
        if($continuar == 'n' or $continuar == 'N'){
            $finalizar = true;
        }
}while($finalizar == false);
?>