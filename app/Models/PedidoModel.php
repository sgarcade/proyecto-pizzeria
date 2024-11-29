<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = 'id_pedido';
    protected $allowedFields = ['id_cliente', 'estado', 'fecha', 'total', 'metodo_pago'];

    public function crearPedido($pedidoData)
    {

        // Insertar en la tabla 'pedido'
        $this->db->table('pedido')->insert($pedidoData);

        // Obtener el ID del pedido recién creado
        $pedidoId = $this->db->insertID(); 

        return $pedidoId; // Retorna el ID del pedido para usarlo en los detalles
    }
    
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


    public function cancelarPedido($idPedido)
    {

        $pedido = $this->db->table('pedido')
            ->select('estado')
            ->where('id_pedido', $idPedido)
            ->get()
            ->getRowArray();


        if ($pedido && $pedido['estado'] !== 'Cancelado') {

            $this->db->table('pedido')
                ->set('estado', 'Cancelado')
                ->where('id_pedido', $idPedido)
                ->update();

            return true; 
        }

        return false; 
    }
    public function getPedidosPendientes()
    {
        return $this->db->table('pedido')
        ->select('pedido.id_pedido, pedido.estado, pedido.fecha, pedido.total, pedido.metodo_pago, producto.nombre_producto, pedido_detalle.cantidad, pedido_detalle.precio_unitario, usuario.nombre AS nombre_cliente')
        ->join('pedido_detalle', 'pedido.id_pedido = pedido_detalle.id_pedido')
        ->join('producto', 'pedido_detalle.id_producto = producto.id_producto')
        ->join('cliente', 'pedido.id_cliente = cliente.id_cliente')
        ->join('usuario', 'cliente.id_usuario = usuario.id_usuario')
        ->whereIn('pedido.estado', ['Pendiente', 'A la espera de un Domiciliario'])
        ->get()
        ->getResultArray();

    }
    public function getChefsDisponibles()
    {
        return $this->db->table('chef')->where('disponibilidad', 1)->get()->getResultArray();
    }
    public function getDomiciliariosDisponibles()
    {
        return $this->db->table('domiciliario')->where('disponibilidad', 1)->get()->getResultArray();
    }


    public function asignarChef($id_pedido, $chef_id)
    {

        $this->db->table('pedido')
            ->set('estado', 'En Preparación')
            ->where('id_pedido', $id_pedido)
            ->update();

        $this->db->table('pedido')
            ->set('id_chef', $chef_id)
            ->where('id_pedido', $id_pedido)
            ->update();
    }


    public function asignarDomiciliario($id_pedido, $domiciliario_id)
    {

        $this->db->table('pedido')
            ->set('estado', 'En Camino')
            ->where('id_pedido', $id_pedido)
            ->update();

        $this->db->table('pedido')
            ->set('id_domiciliario', $domiciliario_id)
            ->where('id_pedido', $id_pedido)
            ->update();
    }




}


