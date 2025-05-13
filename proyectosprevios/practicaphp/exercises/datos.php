<?php

$Pi=3.1416;

$radio=$_POST['r'];
$altura=$_POST['h'];
$volumen=($Pi*($radio*$radio)*$altura)/3;
echo "El volumen del cilindro es ". $volumen;

?> 