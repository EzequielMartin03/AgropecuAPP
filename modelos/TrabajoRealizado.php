<?php
class TrabajoRealizado {
    private $id_trabajo;
    private $id_fumigador;
    private $id_aguatero;
    private $cantidad_hectareas_trabajadas;
    private $fecha_fumigacion;
    private $descripcion;
    private $fecha_pago;
    private $id_usuario;
    private $id_cliente;
    private $nro_factura_afip;

    public function __construct() {
  
        $this->pdo = database::connection();
    }

    // Getters
    public function getIdTrabajo() {
        return $this->id_trabajo;
    }

    public function getIdFumigador() {
        return $this->id_fumigador;
    }

    public function getIdAguatero() {
        return $this->id_aguatero;
    }

    public function getCantidadHectareasTrabajadas() {
        return $this->cantidad_hectareas_trabajadas;
    }

    public function getFechaFumigacion() {
        return $this->fecha_fumigacion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getFechaPago() {
        return $this->fecha_pago;
    }

    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function getIdCliente() {
        return $this->id_cliente;
    }

    public function getNroFacturaAfip() {
        return $this->nro_factura_afip;
    }

    // Setters
    public function setIdTrabajo($id_trabajo) {
        $this->id_trabajo = $id_trabajo;
    }

    public function setIdFumigador($id_fumigador) {
        $this->id_fumigador = $id_fumigador;
    }

    public function setIdAguatero($id_aguatero) {
        $this->id_aguatero = $id_aguatero;
    }

    public function setCantidadHectareasTrabajadas($cantidad_hectareas_trabajadas) {
        $this->cantidad_hectareas_trabajadas = $cantidad_hectareas_trabajadas;
    }

    public function setFechaFumigacion($fecha_fumigacion) {
        $this->fecha_fumigacion = $fecha_fumigacion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setFechaPago($fecha_pago) {
        $this->fecha_pago = $fecha_pago;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function setIdCliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    public function setNroFacturaAfip($nro_factura_afip) {
        $this->nro_factura_afip = $nro_factura_afip;
    }


}
