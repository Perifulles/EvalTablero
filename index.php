<?php session_start(); ?>
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

//ESCRIBE AQUÍ TU PROGRAMA PRINCIPAL

$tablero = [
    [],
    [],
    [],
    [],
    [],
    []
];

//* Para que se guarde el tablero
//* $_SESSION['tablero'] = $tablero;
//* $tablero = isset($_SESSION['tablero']) ? $_SESSION['tablero'] : $tablero = createtablero();



// Verifica si el tablero ya está guardado en la sesión
if (!isset($_SESSION['tablero'])) {
    // Si no existe, crea un nuevo tablero y lo guarda en la sesión
    $_SESSION['tablero'] = createtablerocomplejo();
}

// Obtén el tablero desde la sesión
$tablero = $_SESSION['tablero'];

showcolor($tablero);

//ESCRIBE AQUÍ LA DEFINICIÓN DE LAS FUNCIONES

//Este tablero crea filas aleatorias por lo que nunca coincidirán colores o numeros en la misma fila
function createtablero(){
    for ($i=0; $i<6 ; $i++){
        $numeros = range(1, 6);
        shuffle($numeros);
        $tablero[$i][0]=$numeros;
        for ($o=0; $o<6 ; $o++){
            switch($tablero[$i][0][$o]){
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

    return($tablero);
}

//Sin embargo en esta función he realizado un array con los 36 numeros y luego los he mezclado aleatoriamente.
//El problema es que los colores tambien los pone totalmente aleatorios por lo que puede haber 2 6s iguales.
function createtablerobien(){
    $contco = 0;
    $contnu = 0;
    $numeros36 = [];

    for ($i = 0; $i < 6; $i++) {
        for ($o = 0; $o < 6; $o++) {
            array_push($numeros36, $o + 1);
        }
    }
    shuffle($numeros36);

        for ($i=0; $i<6 ; $i++){
            for ($o=0; $o<6 ; $o++){
            switch($numeros36[$contco]){
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
                }
                $contco ++;
            }}

    $numeros36 = [];

    for ($i=0; $i<6 ; $i++){
        for ($o=0; $o<6 ; $o++){
            array_push($numeros36, $o + 1);
            }}
            shuffle($numeros36);

    for ($i=0; $i<6 ; $i++){
        for ($o=0; $o<6 ; $o++){
            $tablero[$i][1][$o] =  $numeros36[$contnu];
            $contnu ++;
        }
    }

    return($tablero);

}

function createtablerocomplejo(){
    $contco = 0;
    $contnu = 0;
    $numeros36 = [];

    for ($i=0; $i<6 ; $i++){
        for ($o=0; $o<6 ; $o++){
            array_push($numeros36, $o + 1);
            }}
            shuffle($numeros36);

    for ($i=0; $i<6 ; $i++){
        for ($o=0; $o<6 ; $o++){
            $tablero[$i][1][$o] =  $numeros36[$contnu];
            $contnu ++;
        }
    }


    $numeros36c = [];

    for ($i=0; $i<6 ; $i++){
        for ($o=0; $o<6 ; $o++){
            array_push($numeros36c, $o + 1);
            }}
            shuffle($numeros36c);

    $conteoBlancos = [];
    $conteoAzules = [];
    $conteoVerdes = [];
    $conteoAmarillos = [];
    $conteoNegros = [];
    $conteoRojos = [];

        for ($i=0; $i<6 ; $i++){
            for ($o=0; $o<6 ; $o++){
                if ($numeros36c[$contco] == 1 && !isset($conteoBlancos["blanco" . $numeros36[$contco]])) {
                    $tablero[$i][0][$o] = "WH";
                    $conteoBlancos["blanco" . $numeros36[$contco]] = true;
                } elseif ($numeros36c[$contco] == 2 && !isset($conteoNegros["negro" . $numeros36[$contco]])) {
                    $tablero[$i][0][$o] = "BK";
                    $conteoNegros["negro" . $numeros36[$contco]] = true;
                } elseif ($numeros36c[$contco] == 3 && !isset($conteoAzules["azul" . $numeros36[$contco]])) {
                    $tablero[$i][0][$o] = "BL";
                    $conteoAzules["azul" . $numeros36[$contco]] = true;
                } elseif ($numeros36c[$contco] == 4 && !isset($conteoVerdes["verde" . $numeros36[$contco]])) {
                    $tablero[$i][0][$o] = "GR";
                    $conteoVerdes["verde" . $numeros36[$contco]] = true;
                } elseif ($numeros36c[$contco] == 5 && !isset($conteoAmarillos["amarillo" . $numeros36[$contco]])) {
                    $tablero[$i][0][$o] = "YE";
                    $conteoAmarillos["amarillo" . $numeros36[$contco]] = true;
                } elseif ($numeros36c[$contco] == 6 && !isset($conteoRojos["rojo" . $numeros36[$contco]])) {
                    $tablero[$i][0][$o] = "RE";
                    $conteoRojos["rojo" . $numeros36[$contco]] = true;
                }
                elseif($numeros36c[$contco] == 6){$numeros36c[$contco] = $numeros36c[$contco] - 5 ; $o --; $contco --;}
                else{$numeros36c[$contco] = $numeros36c[$contco] + 1 ; $o --; $contco --;}
                $contco ++;
                }
            }
    return($tablero);
}


function show($array3d){
    for($i=0;$i<6;$i++){
        for($o=0;$o<6;$o++){
        echo $array3d[$i][0][$o];
        echo $array3d[$i][1][$o] . ",";
        }echo "<br>";
    }
}

function showcolor($array3d){
    echo"<div class='contenedor'>";
    for($i=0;$i<6;$i++){
        for($o=0;$o<6;$o++){
        switch($array3d[$i][0][$o]){
            case"WH":
                echo "<span class='casillas' style='background-color:white; color:black'>" . $array3d[$i][1][$o] . "</span>";break;
            case"BK":
                echo "<span class='casillas' style='background-color:black'>" . $array3d[$i][1][$o] . "</span>";break;
            case"BL":
                echo "<span class='casillas' style='background-color:blue'>" . $array3d[$i][1][$o] . "</span>";break;
            case"GR":
                echo "<span class='casillas' style='background-color:green'>" . $array3d[$i][1][$o] . "</span>";break;
            case"RE":
                echo "<span class='casillas' style='background-color:red'>" . $array3d[$i][1][$o] . "</span>";break;
            case"YE":
                echo "<span class='casillas' style='background-color:yellow; color:black'>" . $array3d[$i][1][$o] . "</span>";break;
            }
        }echo "<br>";
    }
    echo"</div>";
}

?>