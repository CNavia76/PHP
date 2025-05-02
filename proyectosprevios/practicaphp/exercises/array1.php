<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>EJERCICIO 1</h2>
  
    <?php
      
        $estudiante = array("Carlos","José","Vanessa","Katy");
        $estudiante[3]="Carolina"; 

        echo "<h3>Array Escalar con 4 elementos</h3>";
        echo $estudiante[0]. "<br>";
        echo $estudiante[1] ."<br>";
        echo $estudiante[2] ."<br>";
        echo $estudiante[3] ."<br>";
    ?>

    <h2>EJERCICIO 2</h2>
    
    <?php
        $estudiantes=[
            "nombre"=>"Carlos",
            "apellido"=>"Alfaro",
            "edad"=>27];
        
        echo "<h3>Array Asociativo</h3>";
        echo $estudiantes["nombre"] . "<br>";
        echo $estudiantes["apellido"] . "<br>";         
        echo $estudiantes["edad"] ."<br>";
        
    ?>
    <h2>EJERCICIO 3</h2>
    
    <?php
        $tutor_1=[
            "nombre"=>"Carlos",
            "apellido"=>"Alfaro",
            "edad"=>27,
            "cursos"=>["PHP","Python","CSS"]
        ];
        
        echo "<h3>Array Multidimensional</h3>";
        echo $tutor_1["cursos"][0] . "<br>";
        echo $tutor_1["cursos"][1] . "<br>";
        echo $tutor_1["cursos"][2] . "<br>";
        echo count($tutor_1);

    ?>
</body>
</html>