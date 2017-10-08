<?php

/* 
 * La siguiente clase que crearemos es ControladoresBase de la cual heredarán 
 * los controladores, esta clase carga EntidadesBase, ModelosBase, y todos los 
 * modelos creados dentro del directorio model.
 */

/* version 2
 * Primero modificaremos ControladorBase para hacer que el fichero Conectar.php 
 * esté disponible en todo el código.
 */

class ControladorBase{
 
    public function __construct() {
    require_once 'Conectar.php';
        require_once 'EntidadBase.php';
        require_once 'ModeloBase.php';
         
        //Incluir todos los modelos
        foreach(glob("model/*.php") as $file){
            require_once $file;
        }
    }
     
    //Plugins y funcionalidades
     
    public function view($vista,$datos){
        foreach ($datos as $id_assoc => $valor) {
            ${$id_assoc}=$valor; 
        }
         
        require_once 'core/AyudaVistas.php';
        $helper=new AyudaVistas();
     
        require_once 'view/'.$vista.'View.php';
    }
     
    public function redirect($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
        header("Location:index.php?controller=".$controlador."&action=".$accion);
    }
     
    //Métodos para los controladores
 
}
?>