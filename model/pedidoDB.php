<?php

    class PedidoDB{
        
        protected $id;
        protected $id_cliente;
        protected $precio_total;
        protected $fecha;
        protected $puntos;
        protected $valoracion;
        protected $reseña;


        public function __construct(){
        }


        public function getId()
        {
                return $this->id;
        }

        
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }


        public function getId_cliente()
        {
                return $this->id_cliente;
        }

        
        public function setId_cliente($id_cliente)
        {
                $this->id_cliente = $id_cliente;

                return $this;
        }


        public function getPrecio_total()
        {
                return $this->precio_total;
        }

        
        public function setPrecio_total($precio_total)
        {
                $this->precio_total = $precio_total;

                return $this;
        }

        public function getPuntos()
        {
                return $this->puntos;
        }


        public function setPuntos($puntos)
        {
                $this->puntos = $puntos;

                return $this;
        }


        public function getFecha()
        {
                return $this->fecha;
        }

        
        public function setFecha($fecha)
        {
                $this->fecha = $fecha;

                return $this;
        }

        public function getValoracion()
        {
                return $this->valoracion;
        }


        public function setValoracion($valoracion)
        {
                $this->valoracion = $valoracion;

                return $this;
        }

        
        public function getReseña()
        {
                return $this->reseña;
        }

        public function setReseña($reseña)
        {
                $this->reseña = $reseña;

                return $this;
        }

    }
?>