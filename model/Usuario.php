<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* 
 * Si queremos seguir el paradigma de la programación orientada a objetos 
 * teóricamente deberíamos tener una clase por cada tabla de la base de datos
 * (excepto tablas pivote) que haga referencia a un objeto de la vida real, en 
 * este caso el objeto que crearíamos seria “Usuario” y el usuario tendría un 
 * nombre, un apellido, un email, etc, pues bien eso serian los atributos del 
 * objeto y tendríamos un método get y set por cada atributo que servirán para 
 * establecer el valor de las propiedades y para conseguir el valor de cada 
 * atributo. Esta clase hereda de EntidadesBase y tiene un método save para 
 * guardar el usuario en la base de datos, podríamos tener otro método update 
 * que seria similar, etc.
 * 
 * Y te preguntarás ¿por que no lo haces así siempre? la respuesta es simple, en 
 * algunos proyectos en los que hay muchas tablas puede ser engorroso estar 
 * creando una clase por cada tabla solamente para tener un insert y un 
 * update(aunque tiene sus ventajas) aunque según este paradigma no sea del 
 * todo correcto omito esto y directamente creo modelos de consultas en los 
 * que tengo métodos que interaccionan con una tabla mayoritariamente o varias 
 * según las relaciones que tengan, por otra parte algunos frameworks cuentan 
 * con ORMs que nos ayudan con todo esto pero de igual forma cuando tienes 
 * muchas tablas relacionadas quizá el uso del ORM sin controlarlo muy bien 
 * puede dificultar la tarea, en cualquier caso lo más correcto es tener una 
 * clase por entidad aunque a veces no sea lo más practico o cómodo.
 * 
 * Truco: si usas NetBeans puedes generar los getters y setters desde el menú 
 * Source -> Insert Code
 */

/* version 2
 * Ahora nuestras entidades recibirán la conexión como parametro, 
 * de esta forma:
 */

class Usuario extends EntidadBase{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
     
    public function __construct($adapter) {
        $table="usuarios";
        parent::__construct($table, $adapter);
    }
     
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
    }
     
    public function getNombre() {
        return $this->nombre;
    }
 
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
 
    public function getApellido() {
        return $this->apellido;
    }
 
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
 
    public function getEmail() {
        return $this->email;
    }
 
    public function setEmail($email) {
        $this->email = $email;
    }
 
    public function getPassword() {
        return $this->password;
    }
 
    public function setPassword($password) {
        $this->password = $password;
    }
 
    public function save(){
        $query="INSERT INTO usuarios (id,nombre,apellido,email,password)
                VALUES(NULL,
                       '".$this->nombre."',
                       '".$this->apellido."',
                       '".$this->email."',
                       '".$this->password."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }
 
}
?>