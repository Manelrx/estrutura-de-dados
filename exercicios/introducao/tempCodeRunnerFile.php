<?php

//1) Elabore uma calculadora onde o usuário informará dois números e uma operação (+, -, *, /) e retorne o resultado da operação.
$parar = false;
define("padrao","\033[0m");
define("vermelho","\033[31m");
define("verde","\033[32m");
define("azul","\033[34m");

do{
    $validaDivisaoZero = false;
    
    while($validaDivisaoZero == false){
        $primeiroValor = readline(vermelho. "Informe o primeiro valor: ");
        $segundoValor = readline(azul. "Informe o segundo valor: ");
        echo verde. "[ +, -, *, /] 0-Sair \n";
        $opcao = readline("Qual operação deseja realizar: ");

        if($opcao == 0){
            echo "não é possivel subtrair por 0 \n ";
            break;
        }else{
          $validaDivisaoZero = true;
          switch($opcao){
            case 1:
                echo padrao. "$primeiroValor + $segundoValor = " . $primeiroValor + $segundoValor . "\n";
            break;
            case 2: 
                echo azul. "$primeiroValor - $segundoValor = " . $primeiroValor - $segundoValor . "\n";
            break;
            case 3: 
                echo vermelho. "$primeiroValor vezes $segundoValor = " . $primeiroValor * $segundoValor . "\n";
                break;
            case 4: 
                if($opcao == 4 and  $segundoValor == 0){
                    break;
                }else{
                    echo verde. "$primeiroValor dividido $segundoValor = " . $primeiroValor / $segundoValor . "\n";
                break;
                }
            default:
                echo "Essa opção não existe, favor informe novamente \n";
            }       
        }
    }   
}while($parar == false);

?>