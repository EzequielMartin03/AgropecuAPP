<?php

class Fumigador {
    private $id_fumigador;
    private $nombre_fumigador;
    private $direccion_fumigador;
    private $telefono_fumigador;
    private $cuit_fumigador;

    public function __construct() {
     
    }


    public function getIdFumigador() {
        return $this->id_fumigador;
    }

    public function getNombreFumigador() {
        return $this->nombre_fumigador;
    }

    public function getDireccionFumigador() {
        return $this->direccion_fumigador;
    }

    public function getTelefonoFumigador() {
        return $this->telefono_fumigador;
    }

    public function getCuitFumigador() {
        return $this->cuit_fumigador;
    }



    
    public function setIdFumigador($id_fumigador) {
        $this->id_fumigador = $id_fumigador;
    }

    public function setNombreFumigador($nombre_fumigador) {
        $this->nombre_fumigador = $nombre_fumigador;
    }

    public function setDireccionFumigador($direccion_fumigador) {
        $this->direccion_fumigador = $direccion_fumigador;
    }

    public function setTelefonoFumigador($telefono_fumigador) {
        $this->telefono_fumigador = $telefono_fumigador;
    }

    public function setCuitFumigador($cuit_fumigador) {
        $this->cuit_fumigador = $cuit_fumigador;
    }


}
