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
        $chefs = $chefModel->findAll();

        $domiciliarioModel = new DomiciliarioModel();
        $domiciliarios = $domiciliarioModel->findAll();

        // Pasar datos a la vista
        return view('recepcionPedidos', [
            'pedidos' => $pedidos,
            'chefs' => $chefs,
            'domiciliarios' => $domiciliarios
        ]);


    }
}