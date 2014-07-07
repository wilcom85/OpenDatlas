<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../classes/mySqlConnectionClass.php';
include_once '../classes/arrayFunctionsClass.php';
include_once '../classes/webservice.php';

$connect = new mySqlConnection();
$connect ->establecerConexion();
$array = new arrayFunction();
$ws = new webservice();

$idDepto = $_GET["idDepto"];
$parametros = array($idDepto);
$datosDepto = $connect->setProcedimiento("obtenerDatasetsDepto", $parametros);
//$nombreDepto = $connect->seleccionarDatosCondicion("nombre", "departamentos", "codigoDane = ".$idDepto);
$arrayURL = $array->datosAArrayX($datosDepto);
var_dump($arrayURL);
$connect->cerrarConexion();

$connect2 = new mySqlConnection();
$connect2->establecerConexion();
$nombreDepto = $connect2->seleccionarDatosCondicion("nombre", "departamentos", "codigoDane = ".$idDepto);
$nombreDepto = $array->datosAArrayX($nombreDepto);
$connect2->cerrarConexion();


session_start();
$_SESSION['$datos'] = $arrayURL; 
header('Location: ../vista/departamento.php?nombreDepto='.$nombreDepto[0][0]);

//$noDatasets = count($arrayURL);
//
//if($noDatasets>0){
//    for($i=0;$i<$noDatasets;$i++){
//        $url = $arrayURL[$i][1]."?&".'$format'."=json";
//        echo $url;
//        $ws->setURL($url);
//        $arrayClaves = $ws->getClaves();
//        var_dump($arrayClaves);
//        echo "</br></br>";
//    }   
//}

//$url = $arrayURL2[0][1];

//$url = $url."?&".'$format'."=json";
//echo $url;


//echo $idDepto;
//echo "x".$arrayURL['url'];

