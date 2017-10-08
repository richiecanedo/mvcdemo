<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* 
 * Ahora crearemos la clase ModeloBase que heredará de la clase EntidadBase y 
 * a su vez será heredada por los modelos de consultas. La clase ModeloBase 
 * permitirá utilizar el constructor de consultas que hemos incluido y también 
 * los métodos de EntidadBase, así como otros métodos que programemos dentro de 
 * la clase, por ejemplo yo tengo un método para ejecutar consultas sql que 
 * directamente me devuelve el resultset en un array de objetos preparado para 
 * pasárselo a una vista, podríamos tener cientos para diferentes cosas.
 */

/* version 2
 * Ahora modificaremos también modelo base para pasarle la conexión:
 */

class ModeloBase extends EntidadBase{
    private $table;
    private $fluent;
     
    public function __construct($table, $adapter) {
        $this->table=(string) $table;
        parent::__construct($table, $adapter);
         
        $this->fluent=$this->getConetar()->startFluent();
    }
     
    public function fluent(){
        return $this->fluent;
    }
     
    public function ejecutarSql($query){
        $query=$this->db()->query($query);
        if($query==true){
            if($query->num_rows>1){
                while($row = $query->fetch_object()) {
                   $resultSet[]=$row;
                }
            }elseif($query->num_rows==1){
                if($row = $query->fetch_object()) {
                    $resultSet=$row;
                }
            }else{
                $resultSet=true;
            }
        }else{
            $resultSet=false;
        }
         
        return $resultSet;
    }
     
    //Aqui podemos montarnos metodos para los modelos de consulta
     
}
?>