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
        
        $db = \Config\Database::connect();
        $db->transStart();
    
        try {
            
            $this->db->table('pedido')->insert($pedidoData);
            $pedidoId = $this->db->insertID(); 

            if (!$pedidoId) {
                throw new \Exception('No se pudo obtener el ID del pedido.');
            }
          
            $db->transComplete();
            

            
            if ($db->transStatus() === FALSE) {
                throw new \Exception('Error en la transacción de base de datos');
            }
    
            return $pedidoId;
        } catch (\Exception $e) {
            
            $db->transRollback(); 
            log_message('error', 'Error al crear el pedido: ' . $e->getMessage());
            return false; 
        }
    }
    
    
    

    public function agregarDetallePedido($detalles, $pedidoId)
{
    
    $db = \Config\Database::connect();
    $db->transStart();

    try {
        
        foreach ($detalles as $detalle) {
        
            $detalle['id_pedido'] = $pedidoId;
            
            $this->db->table('pedido_detalle')->insert($detalle);
        }

       
        $db->transComplete(); 

        // Verificar si la transacción fue exitosa
        if ($db->transStatus() === FALSE) {
            throw new \Exception('Error en la transacción de base de datos');
        }

        // Si la transacción es exitosa, retorna verdadero o el número de filas afectadas
        return true; 

    } catch (\Exception $e) {
        // Si ocurre un error, hacer rollback
        $db->transRollback(); // Revierte cualquier cambio en caso de error
        log_message('error', 'Error al agregar los detalles del pedido: ' . $e->getMessage());
        return false; // O manejar el error según tu necesidad
    }
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
    public function getPedidosEnPreparacion($id_chef)
    {
        return $this->db->table('pedido')
        ->select('pedido.id_pedido, pedido.estado, pedido.fecha, pedido.total, pedido.metodo_pago, producto.nombre_producto, pedido_detalle.cantidad, pedido_detalle.precio_unitario, usuario.nombre AS nombre_cliente')
        ->join('pedido_detalle', 'pedido.id_pedido = pedido_detalle.id_pedido')
        ->join('producto', 'pedido_detalle.id_producto = producto.id_producto')
        ->join('cliente', 'pedido.id_cliente = cliente.id_cliente')
        ->join('usuario', 'cliente.id_usuario = usuario.id_usuario')
        ->where('pedido.id_chef', $id_chef)
        ->whereIn('pedido.estado', ['En Preparación'])
        ->get()
        ->getResultArray();

    }
    public function getPedidosEnCamino($id_domiciliario)
{
    return $this->db->table('pedido')
        ->select('pedido.id_pedido, pedido.estado, pedido.fecha, pedido.total, pedido.metodo_pago, producto.nombre_producto, pedido_detalle.cantidad, pedido_detalle.precio_unitario, usuario.nombre AS nombre_cliente')
        ->join('pedido_detalle', 'pedido.id_pedido = pedido_detalle.id_pedido')
        ->join('producto', 'pedido_detalle.id_producto = producto.id_producto')
        ->join('cliente', 'pedido.id_cliente = cliente.id_cliente')
        ->join('usuario', 'cliente.id_usuario = usuario.id_usuario')
        ->where('pedido.id_domiciliario', $id_domiciliario) // Filtro por id_domiciliario
        ->whereIn('pedido.estado', ['En camino']) // Filtro por estado
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
            ->set('estado', 'En camino')
            ->where('id_pedido', $id_pedido)
            ->update();

        $this->db->table('pedido')
            ->set('id_domiciliario', $domiciliario_id)
            ->where('id_pedido', $id_pedido)
            ->update();
    }

    public function terminarPreparacion($id_pedido)
    {

        $this->db->table('pedido')
            ->set('estado', 'A la espera de un Domiciliario')
            ->where('id_pedido', $id_pedido)
            ->update();

    }

    public function entregarPedido($id_pedido)
    {

        $this->db->table('pedido')
            ->set('estado', 'Entregado')
            ->where('id_pedido', $id_pedido)
            ->update();

    }




}


