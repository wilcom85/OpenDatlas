<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class arrayFunction{
    private $arraydatos;
    private $arraydatos2;
    public function datosAArray($buscar) {
            $i=0;
            $arraydatos0=array();
            while($datos = mysql_fetch_array($buscar)){
                $arraydatos0[$i] =$datos[0];
                $i++;
            }
            $this->arraydatos = $arraydatos0;
            return $this->arraydatos;
    }
    public function datosAArrayBid($buscar) {
            $i=0;
            $arraydatos1=array();
            while($datos = mysql_fetch_array($buscar)){
                $arraydatos1[$i][0] =$datos[0];
                $arraydatos1[$i][1] =$datos[1];
                $i++;
            }
            $this->arraydatos2 = $arraydatos1;
            return $this->arraydatos2;
    }
    
    public function datosAArrayTri($buscar) {
            $i=0;
            $arraydatos1=array();
            while($datos = mysql_fetch_array($buscar)){
                $arraydatos1[$i][0] =$datos[0];
                $arraydatos1[$i][1] =$datos[1];
                $arraydatos1[$i][2] =$datos[2];
                $i++;
            }
            $this->arraydatos2 = $arraydatos1;
            return $this->arraydatos2;
    }
    
    public function datosAArrayX($buscar) {
        $i=0;
        $array = array();
        while($buscado = mysql_fetch_array($buscar)){
            for($n=0;$n<(count($buscado))/2;$n++){
                $array[$i][$n]=$buscado[$n];
            }
            //var_dump($buscado);
            $i++;
        }    
        //var_dump($array);
        return $array;      
    }
}
?>