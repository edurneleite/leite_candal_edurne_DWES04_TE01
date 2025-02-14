<?php
require '../core/DatabaseSingleton.php';
require '../app/model/DTO/PedidoDTO.php';

class PedidoDAO {

    private $db;
    public function __construct() {
        $this->db=DatabaseSingleton::getInstance();
    }

    // ----------------------------CRUD
    // GETALL
    public function getAllPedidos() {
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM pedidos";
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    //GETBYID
    public function getPedidosById($id) {
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM pedidos JOIN clientes ON pedidos.id_cliente = clientes.id_cliente WHERE clientes.id_cliente = ".$id;
        $statement = $connection->query($query);
        // Manejo de errores
        if ($statement === false) {
            $errorInfo = $connection->errorInfo();
            echo "Error en la consulta SQL: " . $errorInfo[2];
            return false;
        }
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $pedidosDTO = array();
        for ($i = 0; $i < count($result); $i++) {
            $fila = $result[$i];
            $pedidoDTO = new PedidoDTO(
                $fila['id_pedido'],
                $fila['id_cliente'], 
                $fila['total'], 
                $fila['fecha_pedido'] 
            );
            $pedidosDTO[] = $pedidoDTO;
        }
        return $pedidosDTO;
    }
    
    // NEWPEDIDO
    public function newPedido($id_cliente, $total) {
        $connection = $this->db->getConnection();
        $query = "INSERT INTO pedidos (id_cliente, total, fecha_pedido) VALUES (:id_cliente, :total, NOW())";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt->bindParam(':total', $total, PDO::PARAM_STR);
    
        if ($stmt->execute()) {
            return $connection->lastInsertId();
        } else {
            $errorInfo = $stmt->errorInfo();
            throw new Exception('Error al ejecutar la consulta SQL: ' . $errorInfo[2]);
        }
    }
    // DELETE
    public function deletePedido($id) {
        $connection = $this->db->getConnection();
        $query = " DELETE FROM pedidos WHERE id_cliente = ".$id;
        $statement = $connection->query($query);
        // Manejo de errores
        if ($statement === false) {
            $errorInfo = $connection->errorInfo();
            echo "Error en la consulta SQL: " . $errorInfo[2];
            return false;
        }
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // UPDATEPEDIDO
    public function updatePedido($id, $data) {
        $connection = $this->db->getConnection();
        $query = "UPDATE pedidos SET id_cliente = :id_cliente, total = :total, fecha_pedido = :fecha_pedido WHERE id_pedido = :id_pedido";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':id_cliente', $data['id_cliente'], PDO::PARAM_INT);
        $stmt->bindParam(':total', $data['total'], PDO::PARAM_STR);
        $stmt->bindParam(':fecha_pedido', $data['fecha_pedido'], PDO::PARAM_STR);
        $stmt->bindParam(':id_pedido', $id, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            return true; 
        } else {
            // Manejo de errores
            $errorInfo = $stmt->errorInfo();
            throw new Exception('Error al ejecutar la consulta SQL: ' . $errorInfo[2]);
        }
    }
}

?>