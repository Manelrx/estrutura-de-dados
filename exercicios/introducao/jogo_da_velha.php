<?php
/*Desenvolva uma versão PHP CLI (linha de comando) do jogo da velha.

Utilize uma matriz de 9 posições 3x3

Deverá esperar entrada de dados (posição) de cada jogador, de forma intercalada.

Para facilitar a jogada, é interessante mapear as "casas" como abaixo:

a     b      c

d      e      f

g      h      i


- Posição/opção "a" será equivalente ao índice [0][0]
- Posição/opção "b" será equivalente ao índice [0][1]
- Posição/opção "c" será equivalente ao índice [0][2]
...
- Posição/opção "i" será equivalente ao índice [2][2]


Ao realizar a jogada, deverá ser apresentada na tela a situação do jogo:
Quais casas estão ocupadas, quais estão livres.
Se a jogada definiu um vencedor.
Se será liberada a entrada de dados para o próximo jogador.
Se empate, ou "Deu velha".

Para vencer é necessário que o jogador consiga manter uma sequência "x" ou "o":
- Linha completa
- Coluna completa
- Diagonal principal
- Diagonal secundária

A atividade poderá ser realizada pelo grupo (3 pessoas), no entanto deverá ser enviada por cada integrante, não se esqueçam de "Enviar".*/


$matriz = [
    ['a','b','c'],
    ['d','e','f'],
    ['g','h','i']
]


?>