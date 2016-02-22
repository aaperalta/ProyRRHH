<?php

class database extends PDO {
    
    public function __construct() {
        
        try {
            parent::__construct('mysql:host=localhost;dbname=rrhhdb','root','');
            parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            echo $ex . '<br>';
            die ('Error al conectar a la base de datos.');
            }
        }
 }

