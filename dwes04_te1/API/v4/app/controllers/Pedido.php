<?php
require '../app/model/DAO/PedidoDAO.php';


class Pedido{
    function __construct(){
    }
    //GET ALL
    function getAll(){
        echo'TODOS LOS PEDIDO : <br>';
        $pedidoDAO = new PedidoDAO();
        $pedidos = $pedidoDAO->getAllPedidos();
        echo json_encode($pedidos);
    }
    //GET BY ID
    function getPedidosById($id){
        echo 'PEDIDO : <br>';
        $pedidoDAO = new PedidoDAO();
        $pedidos = $pedidoDAO->getPedidosById($id);
        echo json_encode($pedidos);
    }
    // NEW PEDIDO
     function newPedido() {
        echo 'NUEVO PEDIDO: ';
        //Obtenemos los datos
        $data = json_decode(file_get_contents('php://input'), true);
        if ($data) {
            print_r($data);
            if (isset($data['id_cliente']) && isset($data['total'])) {
                $pedidoDAO = new PedidoDAO();
                $pedido = $pedidoDAO->newPedido($data['id_cliente'], $data['total']);
                echo json_encode($pedido);
            } else {
                echo ('error Datos incompletos');
            }
        } else {
            echo ('error: Datos no válidos');
        }
    }
    //UPDATE PEDIDO
    function updatePedido($id){
        echo'EL PEDIDO QUE HAS ACTUALIZADO:';
        $data = json_decode(file_get_contents('php://input'), true);
        $pedidoDAO = new PedidoDAO();
        try {
            $pedidoDAO->updatePedido($id, $data);
            echo 'Pedido actualizado correctamente<br>';
        } catch (Exception $e) {
            echo 'Error al actualizar el pedido: ' . $e->getMessage() . '<br>';
        }
    }
    //DELETE PEDIDO
    function deletePedido($id){
        echo 'PEDIDO ELIMINADO CORRECTAMENTE <br>';
        $pedidoDAO = new PedidoDAO();
        $pedido = $pedidoDAO->deletePedido($id);
    }

}