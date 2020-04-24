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
            return $this->magen;
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
            $this->magen = $pImagen;
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
        public function crearProducto() {
            $sql = "INSERT INTO productos VALUES (null,{$this->getCategoriaId()},'{$this->getNombre()}','{$this->getDescripcion()}',{$this->getPrecio()},{$this->getStock()},null,CURDATE(),null)";
            $query = $this->db->query($sql);
            $result = false;
            if($query) {
                $result = false;
            }
            return $result;
        } 

    }