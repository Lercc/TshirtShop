<?php 
    class Database {
        public static function conectar() {
            $db = new mysqli('localhost','administrador','administrador','tienda_master','3308');
            $db->query("SET NAMES 'utf8'");
            return $db;
        }
    }
?>