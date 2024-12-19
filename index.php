<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form method="POST">
<h1>Cual va a ser tu proximo movimiento?</h1>
<span style="font-family: 'Courier New', Courier, monospace;"><b>Desde</b>

    <select name="ColD">
        <option value="0">A</option>
        <option value="1">B</option>
        <option value="2">C</option>
        <option value="3">D</option>
        <option value="4">E</option>
        <option value="5">F</option>
    </select>

    <select name="FilD">
        <option value="0">1</option>
        <option value="1">2</option>
        <option value="2">3</option>
        <option value="3">4</option>
        <option value="4">5</option>
        <option value="5">6</option>
    </select>
    <br><br>
<span style="font-family: 'Courier New', Courier, monospace;"><b>Hasta</b></span>

    <select name="ColH">
        <option value="0">A</option>
        <option value="1">B</option>
        <option value="2">C</option>
        <option value="3">D</option>
        <option value="4">E</option>
        <option value="5">F</option>
    </select>

    <select name="FilH">
        <option value="0">1</option>
        <option value="1">2</option>
        <option value="2">3</option>
        <option value="3">4</option>
        <option value="4">5</option>
        <option value="5">6</option>
    </select>
    <br><br>
  <input type="submit" value="Comprobar">

</form>
<hr class="linea">


</body>
</html>
<?php

$tablero = [
    [],
    [],
    [],
    [],
    [],
    []
];

for ($i=0; $i<6 ; $i++){
    $numeros = range(1, 6);
    shuffle($numeros);
    $tablero[$i][0]=$numeros;
    for ($o=0; $i<6 ; $o++){
        switch($tablero[$i][0]){
            case"1":
                $tablero[$i][0][$o]= "WH"; break;
            case"2":
                $tablero[$i][0][$o]= "BK"; break;
            case"3":
                $tablero[$i][0][$o]= "BL"; break;
            case"4":
                $tablero[$i][0][$o]= "GR"; break;
            case"5":
                $tablero[$i][0][$o]= "YE"; break;
            case"6":
                $tablero[$i][0][$o]= "RE"; break;
        }}
}

for ($i=0; $i<6 ; $i++){
    $numeros = range(1, 6);
    shuffle($numeros);
    $tablero[$i][1]=$numeros;
}

var_dump($tablero);


//ESCRIBE AQUÍ TU PROGRAMA PRINCIPAL



$tablero = isset($_SESSION['tablero']) ? $_SESSION['tablero'] : $tablero;




//ESCRIBE AQUÍ LA DEFINICIÓN DE LAS FUNCIONES


?>