<?php

class PedidoDTO implements JsonSerializable{
    private $id_pedido;
    private $id_cliente;
    private $total;
    private $fecha;

    public function __construct($id_pedido, $id_cliente, $total, $fecha){
        $this->id_pedido = $id_pedido;
        $this->id_cliente = $id_cliente;
        $this->total = $total;
        $this->fecha = $fecha;
    }
    public function jsonSerialize(){
        return get_object_vars($this);
    }

    public function getId() {
		  return $this->id_pedido;
	  }
    public function getCliente() {
		  return $this->id_cliente;
	  }
    public function getTotal() {
		  return $this->total;
	  }
    public function getFecha() {
		  return $this->fecha;
	  }
}

?>