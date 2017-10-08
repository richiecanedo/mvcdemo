<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* 
 * Aquí pondríamos las consultas completas, en lugar de utilizar los métodos 
 * que tenemos en el modelo de entidad, aunque también estarían accesibles 
 * desde este modelo.
 */

/* version 2
 * Además también tenemos que modificar nuestros modelos de consulta para que 
 * reciban el “adaptador” de la conexión:
 */

class UsuariosModel extends ModeloBase{
    private $table;
     
    public function __construct($adapter){
        $this->table="usuarios";
        parent::__construct($this->table, $adapter);
    }
     
    //Metodos de consulta
    public function getUnUsuario(){
        $query="SELECT * FROM usuarios WHERE email='victor@victor.com'";
        $usuario=$this->ejecutarSql($query);
        return $usuario;
    }
}
?>