<?php

namespace App\Controllers;
use App\Models\PedidoModel;
use App\Models\ChefModel;
use App\Models\DomiciliarioModel;

class RecepcionPedidos extends BaseController
{
    public function listarPedidos()
    {
        $pedidoModel = new PedidoModel();
        $pedidos = $pedidoModel->getPedidosPendientes();
        $chefModel = new ChefModel();
        $chefs = $chefModel->getAllChefs();
        $domiciliarioModel = new DomiciliarioModel();
        $domiciliarios = $domiciliarioModel->getAllDomiciliarios();

        // Pasar datos a la vista
        return view('recepcionPedidos', [
            'pedidos' => $pedidos,
            'chefs' => $chefs,
            'domiciliarios' => $domiciliarios
        ]);

    }

        public function asignarChef($id_pedido)
        {
            $pedidoModel = new PedidoModel();

            $chef_id = $this->request->getPost('chef');
            $pedidoModel->asignarChef($id_pedido, $chef_id);

            return redirect()->to(base_url('recepcionPedidos'))->with('success', 'Chef asignado correctamente y pedido en preparación.');
            

        }
        public function asignarDomiciliario($id_pedido)
        {
            $pedidoModel = new PedidoModel();

            $domiciliario_id = $this->request->getPost('domiciliario');
            $pedidoModel->asignarDomiciliario($id_pedido, $domiciliario_id);
            return redirect()->to(base_url('recepcionPedidos'))->with('success', 'Domiciliario asignado correctamente y pedido en camino.');

        }


}