<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = 'id_pedido';
    protected $allowedFields = ['id_cliente', 'estado', 'fecha', 'total', 'metodo_pago'];

    // Método para obtener los pedidos de un cliente
    public function getPedidosPorCliente($id_cliente)
    {
        return $this->db->table('pedido')
            ->select('pedido.id_pedido, pedido.estado, pedido.fecha, pedido.total, pedido.metodo_pago, producto.nombre_producto, pedido_detalle.cantidad, pedido_detalle.precio_unitario')
            ->join('pedido_detalle', 'pedido.id_pedido = pedido_detalle.id_pedido')
            ->join('producto', 'pedido_detalle.id_producto = producto.id_producto')
            ->where('pedido.id_cliente', $id_cliente)
            ->get()
            ->getResultArray();
    }

    // Método para cancelar un pedido
    public function cancelarPedido($idPedido)
    {
        // Verificar si el pedido existe y no está cancelado
        $pedido = $this->db->table('pedido')
            ->select('estado')
            ->where('id_pedido', $idPedido)
            ->get()
            ->getRowArray();

        // Si el pedido existe y no está cancelado
        if ($pedido && $pedido['estado'] !== 'Cancelado') {
            // Realizar la actualización del estado a 'Cancelado'
            $this->db->table('pedido')
                ->set('estado', 'Cancelado')
                ->where('id_pedido', $idPedido)
                ->update();

            return true; // La cancelación fue exitosa
        }

        return false; // Si el pedido no existe o ya está cancelado
    }

}


