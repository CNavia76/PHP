<?php

//FUNCIÓN PARA SUMAR 2 NUMEROS
function sumar($a, $b) {
return $a + $b;
}
// Uso de la función
echo sumar(5, 3); // Salida: 8

//FUNCIÓN PARA VERIFICAR QUE UN NÚMERO ES PAR
function esPar($numero) { 
    return $numero % 2 == 0; 
    } // Uso de la función 
if (esPar(4)) { echo "El número es par."; 
    } 
else { echo "El número es impar."; } // Salida: El número es par.

?>
