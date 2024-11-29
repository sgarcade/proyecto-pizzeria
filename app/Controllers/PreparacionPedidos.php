<?php

namespace App\Controllers;
use App\Models\PedidoModel;
use App\Models\ChefModel;
use App\Models\DomiciliarioModel;

class PreparacionPedidos extends BaseController
{
    public function listarPedidos($id_chef)
    {
        $pedidoModel = new PedidoModel();
        $pedidos = $pedidoModel->getPedidosEnPreparacion($id_chef);        
        // Pasar datos a la vista
        return view('preparacionPedidos', [
            'pedidos' => $pedidos
        ]);

    }
    public function terminarPreparacion($id_pedido)
        {
            $pedidoModel = new PedidoModel();
            
            $pedidoModel->terminarPreparacion($id_pedido);

            return redirect()->to(base_url('preparacionPedidos'))->with('success', 'Chef asignado correctamente y pedido en preparación.');
            

        }
}