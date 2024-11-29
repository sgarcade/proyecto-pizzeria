<?php

namespace App\Controllers;
use App\Models\PedidoModel;
use App\Models\ChefModel;
use App\Models\DomiciliarioModel;

class EntregaPedidos extends BaseController
{
    public function listarPedidos($id_domiciliario)
    {

        $pedidoModel = new PedidoModel();
        $pedidos = $pedidoModel->getPedidosEnCamino($id_domiciliario);

        return view('entregaPedidos', ['pedidos' => $pedidos]);
        

    }
    public function entregarPedido($id_pedido)
        {
            $id_usuario = session()->get('usuario')['id_usuario'];
            $pedidoModel = new PedidoModel();
            $domiciliarioModel = new DomiciliarioModel();
            $domiciliario = $domiciliarioModel->getDomiciliarioByUserId($id_usuario);
            $id_domiciliario = $domiciliario ? $domiciliario['id_domiciliario'] : null;
            
            $pedidoModel->entregarPedido($id_pedido);
            

            return redirect()->to(base_url('entregarPedidos/'. $id_domiciliario))->with('success', 'Pedido entregado correctamente');
            

        }
}