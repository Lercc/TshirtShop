<?php

    class Producto {

        private $id;
        private $categoria_id;
        private $nombre;
        private $descripcion;
        private $precio;
        private $stock;
        private $oferta;
        private $fecha;
        private $imagen;

        private $db;

        public function __construct( ) {
            $this->db = Database::conectar();
        }

        //geters
        public function getId() {
            return $this->id;
        }
        public function getCategoriaId() {
            return $this->categoria_id;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getDescripcion() {
            return $this->descripcion;
        }
        public function getPrecio() {
            return $this->precio;
        }
        public function getStock() {
            return $this->stock;
        }
        public function getOferta() {
            return $this->oferta;
        }
        public function getFecha() {
            return $this->fecha;
        }
        public function getImagen() {
            return $this->imagen;
        }
        
        //set-ers
        public function setId($pId) {
            $this->id = $pId;
        }
        public function setCategoriaId($pCategoriaId) {
            $this->categoria_id = $pCategoriaId;
        }
        public function setNombre($pNombre) {
            $this->nombre = $pNombre;
        }
        public function setDescripcion($pDescripcion) {
            $this->descripcion = $pDescripcion;
        }
        public function setPrecio($pPrecio) {
            $this->precio = $pPrecio;
        }
        public function setStock($pStock) {
            $this->stock = $pStock;
        }
        public function setOferta($pOferta) {
            $this->oferta = $pOferta;
        }
        public function setFecha($pFecha) {
            $this->fecha = $pFecha;
        }
        public function setImagen($pImagen) {
            $this->imagen = $pImagen;
        }
        //
        public function escapeString ($pString) {
            return $this->db->real_escape_string($pString);
        }

        //
        public function getAllProductos() {
            $products = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
            if($products) {
                return $products;
            }
            return false;
        }
        
         //
         public function getOne() {
            $sql = "SELECT  * FROM productos WHERE id = {$this->getId()}";
            $query = $this->db->query($sql);
            $result = false;
            if ($query) {
                $result = $query->fetch_object();
            }
            return $result;
        } 

        //
        public function crearProducto() {
            $sql = "INSERT INTO productos VALUES (null,{$this->getCategoriaId()},'{$this->getNombre()}','{$this->getDescripcion()}',{$this->getPrecio()},{$this->getStock()},null,CURDATE(),'{$this->getImagen()}')";
            $query = $this->db->query($sql);
            
            $result = false;
            if($query) {
                $result = true;
            }
            return $result;
        } 
        //
        public function modificarProducto() {
            $sql = "UPDATE productos SET categoria_id = {$this->getCategoriaId()}, nombre = '{$this->getNombre()}', descripcion = '{$this->getDescripcion()}', precio = {$this->getPrecio()}, stock = {$this->getStock()}";
            
            if ($this->getImagen() != null) {
                $sql .= ", imagen = '{$this->getImagen()}'";
            }

            $sql .= " WHERE id = {$this->getId()}"; 
            $query = $this->db->query($sql);

            
            $result = false;
            if($query) {
                $result = true;
            }
            return $result;
        } 
        public function eliminarProducto() {
            $sql = "DELETE FROM productos WHERE id = {$this->getId()}";

            $query = $this->db->query($sql);

            $result = false;
            if($query) {
                $result = true;
            }
            return $result;
        } 
       

    }