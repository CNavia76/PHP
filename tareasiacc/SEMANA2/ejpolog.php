<?php

$a = true;
$b = false;

// Operador AND (&&)
$resultado_and = $a && $b;
echo "Resultado de \$a AND \$b: " . ($resultado_and ? "true" : "false") . "<br>";

// Operador OR (||)
$resultado_or = $a || $b;
echo "Resultado de \$a OR \$b: " . ($resultado_or ? "true" : "false") . "<br>";

// Operador NOT (!)
$resultado_not = !$a;
echo "Resultado de NOT \$a: " . ($resultado_not ? "true" : "false") . "<br>";

// Operador XOR
$resultado_xor = $a xor $b;
echo "Resultado de \$a XOR \$b: " . ($resultado_xor ? "true" : "false") . "<br>";

?>