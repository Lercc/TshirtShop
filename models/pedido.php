<?php

    class Pedido {

        private $id;
        private $usuario_id;
        private $provincia;
        private $localidad;
        private $direccion;
        private $coste;
        private $estado;
        private $fecha;
        private $hora;

        private $db;

        public function __construct( ) {
            $this->db = Database::conectar();
        }
        //GET 'S
        public function getId () {
            return $this->id;
        }
        public function getUsuarioId () {
            return $this->usuario_id;
        }
        public function getProvincia () {
            return $this->provincia;
        }
        public function getLocalidad () {
            return $this->localidad;
        }
        public function getDireccion () {
            return $this->direccion;
        }
        public function getCoste () {
            return $this->coste;
        }
        public function getEstado () {
            return $this->estado;
        }
        //SET 'S
        public function setId ($pId) {
            $this->id = $pId;
        }
        public function setUsuarioId ($pUsuarioId) {
            $this->usuario_id = $pUsuarioId;
        }
        public function setProvincia ($pProvincia) {
            $this->provincia = $pProvincia;
        }
        public function setLocalidad ($pLocalidad) {
            $this->localidad = $pLocalidad;
        }
        public function setDireccion ($pDireccion) {
            $this->direccion = $pDireccion;
        }
        public function setCoste ($pCoste) {
            $this->coste = $pCoste ;
        }
        public function setEstado ($pEstado) {
            $this->estado = $pEstado;
        }
        //LIMPIAR
        public function escapeString($string) {
            return $this->db->real_escape_string($string);
        }
        //
        public function getAllAsUser () {
            $sql = "SELECT * FROM pedidos WHERE usuario_id = {$this->getUsuarioId()}";
            $query = $this->db->query($sql);
            if($query) {
                return $query;
            } else {
                return false;
            }
        }
        //
        public function getAllAsAdmin () {
            $sql = "SELECT * FROM pedidos";
            $query = $this->db->query($sql);
            if($query) {
                return $query;
            } else {
                return false;
            }
        }
        //
        public function getOnePedido () {
            $sql = "SELECT pe.*, u.nombre, u.apellidos, u.email "
                    ."FROM pedidos pe "
                    ."INNER JOIN usuarios u ON pe.usuario_id = u.id "
                    ."WHERE pe.id = {$this->getId()}";
                    
            $query = $this->db->query($sql);

            if($query) {
               return $query;
            } else {
                return false;
            }
        }
        //
        public function getProductosByPedido () {
            $sql = "SELECT pp.producto_id, pr.nombre,pr.imagen,pp.unidades "
                    ."FROM pedido_productos pp "
                    ."INNER JOIN productos pr ON pp.producto_id = pr.id "
                    ."WHERE pp.pedido_id = {$this->getId()}";
            $query = $this->db->query($sql);
            if($query) {
                return $query;
            } else {
                return false;
            }
        }   
        //
        public function crearPedido() {
            $sql = "INSERT INTO pedidos VALUES (null, {$this->getUsuarioId()}, '{$this->getProvincia()}', '{$this->getLocalidad()}', '{$this->getDireccion()}', {$this->getCoste()}, 'confirm', CURDATE(), CURTIME())";
            $query = $this->db->query($sql);
            if($query) {
                return true;
            } else {
                return false;
            }
        }
        //
        public function crearPedidoProductos() {
            // return $this->db->insert_id;  //raras veces falla, pero pasa
            $id = $this->db->query("SELECT LAST_INSERT_ID() as id");
            $pedido_id = $id->fetch_object()->id;
            foreach ( $_SESSION['carrito'] as $producto) {
                $producrto_id = $producto['productoId'];
                $unidades = $producto['unidades'];

                $sql = "INSERT INTO pedido_productos VALUES (null, $pedido_id, $producrto_id, $unidades)";
                $query = $this->db->query($sql);
            }
            if($query) {
                return true;
            } else {
                return false;
            }
        }
        //
        public function cambiarEstado () {
            $sql = "UPDATE pedidos SET estado = '{$this->getEstado()}' WHERE id = {$this->getId()}";
            $query = $this->db->query($sql);
            if($query) {
                return true;
            }
            return false;
        }
    }