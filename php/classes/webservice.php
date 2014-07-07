<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of webservice
 *
 * @author stitc_000
 */
class webservice {
    //put your code here
    private $url = "";
    
    private function leerURL(){
        $url = $this->url;
        $json = file_get_contents($url);
        $data = json_decode($json,TRUE);
        return $data;
    }
    
    private function leerClaves(){
        $data = webservice::leerURL();
        $contador = 0;
        $arrayClaves = array();
        $cantidad = count($data['d']);        
            foreach ($data['d'][0] as $field=>$value){
                $arrayClaves[$contador] = $field;
                $contador++;
            }
        
        return $arrayClaves;
    }
    
    private function leerDatos(){
        $data = webservice::leerURL();
        
        $arrayDatos = array();
        $cantidad = count($data['d']);        
            
            for($n=0;$n<count($data['d']);$n++){
                $contador = 0;
                foreach ($data['d'][$n] as $field=>$value){
                    $arrayDatos[$n][$contador] = $value;
                    $contador++;
                }
            }
        
              
        return $arrayDatos;
    }
    
    
    public function setURL($url) {
        $this -> url = $url;
    }
    
    public function getClaves(){
        try{
            $arrayClaves = webservice::leerClaves();
        } catch (Exception $ex) {
            echo "Error: ".$ex;
        }
        //var_dump($arrayClaves);
        return $arrayClaves;
    }
    
    
    public function getDatos(){
        try{
            $arrayDatos = webservice::leerDatos();
        } catch (Exception $ex) {
            echo "Error: ".$ex;
        }
        //var_dump($arrayClaves);
        return $arrayDatos;
    }
}
