<?php

namespace App\Controllers;

use App\Models\PedidoModel;
use CodeIgniter\Controller;

class Pedidos extends Controller
{

    public function misPedidos($id)
    {
        $pedidoModel = new PedidoModel();        
        $pedidos = $pedidoModel->getPedidosPorCliente($id);  


        return view('pedidos', [
            'pedidos' => $pedidos
        ]);
    }



    public function cancelarPedido($idPedido)
    {
        $pedidoModel = new PedidoModel();

     
        $resultado = $pedidoModel->cancelarPedido($idPedido);

        if ($resultado) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Pedido cancelado exitosamente.'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No se pudo cancelar el pedido.'
            ]);
        }
    }
    

}
