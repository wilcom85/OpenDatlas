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
        //echo "url: " .$url;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec ($ch);
        curl_close ($ch);
 
        //echo $var;
        
        
        
        //$json = file_get_contents($url);
        //echo "json:" . $json;
        $data = json_decode($json,TRUE);
        //echo "ok".$data;
        return $data;
    }
    
    private function leerClaves(){
        $data = webservice::leerURL();
        $contador = 0;
        $arrayClaves = array();
        //echo "ok2".$idata;        

           //var_dump($idata);

        //echo count($data['d']); 
        $cantidad = count($data['d']);        
            foreach ($data['d'][0] as $field=>$value){
                $arrayClaves[$contador] = $field;
                //echo "1".$arrayClaves[$contador];
                $contador++;
            }
            //var_dump($arrayClaves);
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
        //echo $this->url;
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
