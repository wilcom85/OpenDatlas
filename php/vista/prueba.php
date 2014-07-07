<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$url = "http://servicedatosabiertoscolombia.cloudapp.net/v1/Alcaldia_de_San_Joaquin/apdadatasetsanjoaquin?&". '$filter'."=telefonoinstitucioneducativa=7159174&".'$format'."=json";
$json = file_get_contents($url);
$data = json_decode($json,TRUE);
//var_dump($data);

var_dump($data['d'][0]['institucioneducativa']);
//echo $data['d'][0];