<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../classes/webservice.php';

    session_start();
    $arrayDatos = $_SESSION['$datos'];
    $contador = $_GET["contador"];
    $url = $arrayDatos[$contador][1];
    $ws = new webservice();
    $ws->setURL($url);
    $claves = $ws->getClaves();
    //echo $claves;
    //var_dump($claves);
    //tablaInfo::tablaInfo();

//class tablaInfo{
//function tablaInfo(){    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tabla Info</title>
        <link href="../../themes/jquery-ui-1.11.0.custom/jquery-ui.css" rel="stylesheet">
        <link href="../../css/openDatlas.css" rel="stylesheet">
    </head>
    <body>
<?php
    

    echo'<table>';
    
        //$contador2=0;
        echo "<tr>";
            for($i=2; $i < count($claves);$i++){
                echo $contador;
                echo "<td class='ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all'>";
                   echo $claves[$i];
                echo "</td>";
             }
        echo "</tr>";
    $ws->setURL($url);
    $datos = $ws->getDatos();
    //var_dump($datos);
    for($n=0;$n<count($datos);$n++){
        echo "<tr>";
        for($m=2; $m<count($claves);$m++){
            echo "<td>";
                echo $datos[$n][$m];
            echo "</td>";
        }
        echo "</tr>";
     }
     echo"</table>";
//}
?>
</body>
</html>
