<?php

//1) Elabore uma calculadora onde o usuário informará dois números e uma operação (+, -, *, /) e retorne o resultado da operação.
$parar = false;
do{
    $validaNumeros = false;
     $opcao = readline('1-somar \n 2- Subtrair \n 3-Multiplicar \n 4-Dividir \n 0-Sair');
    while($validaNumeros == false){
        $primeiroValor = readline('Informe o primeiro valor: ');
        $segundoValor = readline('Informe o segundo valor');
        if($opcao == 4 and ($primeiroValor == 0 or $segundoValor == 0)){
            echo 'não é possivel subtrair por 0';
        }else{}
    }
    
    echo ('+ soma, - substração, * multiplicação e / divisão');

    switch($opcao){
        case 1:
            echo "$primeiroValor \+ $segundoValor = $primeiroValor + $segundoValor";
        case 2:
            echo "$primeiroValor \- $segundoValor = $primeiroValor - $segundoValor";
        case 3: 
            echo "$primeiroValor vezes $segundoValor = $primeiroValor * $segundoValor";
        case 4: 
            echo "$primeiroValor dividido $segundoValor = $primeiroValor / $segundoValor";
    }


}while($parar == false);






?>