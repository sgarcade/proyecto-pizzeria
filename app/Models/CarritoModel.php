<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ClienteModel;

class CarritoModel extends Model
{
    protected $table = 'carrito';
    protected $primaryKey = 'id_carrito';
        protected $allowedFields = ['id_cliente', 'total', 'fecha'];

    public function getProductosCarrito($id_usuario)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('carrito');
        
        $carrito = $builder->where('id_cliente', $id_usuario)->get()->getResultArray();

        if (empty($carrito)) {
            return [];
        }

        $id_carrito = $carrito[0]['id_carrito'];

        $detallesCarrito = $this->getTotalCarrito($id_carrito);
       
        return [
            'productos' => $detallesCarrito['productos'], 
            'total' => $detallesCarrito['total'],
            'cantidad_total' => $detallesCarrito['cantidad_total']
        ];
    }

    public function getTotalCarrito($id_carrito)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('carrito_detalle');
    
        $builder->select('carrito_detalle.*, producto.nombre_producto as nombre_producto, producto.precio_base as precio_unitario');
        $builder->join('producto', 'carrito_detalle.id_producto = producto.id_producto');
        $builder->where('id_carrito', $id_carrito);
        $productos = $builder->get()->getResultArray();
    
        $builder->selectSum('cantidad', 'cantidad_total');
        $builder->selectSum('subtotal', 'total');
        $builder->where('id_carrito', $id_carrito);
        $result = $builder->get()->getRowArray();
        return [
            'productos' => $productos,       
            'total' => $result['total'] ?? 0,
            'cantidad_total' => $result['cantidad_total'] ?? 0
        ];
    }

    public function getCarritoIdByUsuario($id_usuario)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('carrito');
        $carrito = $builder->where('id_cliente', $id_usuario)->get()->getRowArray();
        
        return $carrito ? $carrito['id_carrito'] : null;
       
    }

    public function actualizarTotalCarrito($id_carrito, $nuevoTotal)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('carrito');
        $builder->where('id_carrito', $id_carrito)
                ->update(['total' => $nuevoTotal]);
               
    }
    public function eliminarProducto($id_producto, $id_carrito)
    {
        
        $db = \Config\Database::connect();
        $builder = $db->table('carrito_detalle');
        
        $builder->where('id_producto', $id_producto)
                ->where('id_carrito', $id_carrito)
                ->delete();
                                         
               
    }       


    public function agregarDetallePedido($detalles)
    {
        $this->db->table('pedido_detalle')->insertBatch($detalles);
    }
    

    public function confirmarPago()
{
    $usuarioId = session()->get('usuario')['id_usuario'];
    
    $barrio = $this->request->getPost('barrio');
    $id_tienda = null;
    
    switch($barrio) {
        case 'El Retiro':
        case 'Rosales':
        case 'Chapinero Alto':
            $id_tienda = 1;
            break;
        case 'Villa Maria':
        case 'Altos de Suba':
        case 'Rincón de Suba':
            $id_tienda = 2;
            break;
        case 'Castilla':
        case 'Timiza':
        case 'El Tintal':
            $id_tienda = 3;
            break;
    }

    if (!$usuarioId || !$id_tienda) {
        return redirect()->to('/shopcar')->with('error', 'Datos inválidos.');
    }

    $carritoModel = new CarritoModel();
    $pedidoModel = new PedidoModel();

    $carrito = $carritoModel->getProductosCarrito($usuarioId);

    if (empty($carrito['productos'])) {
        return redirect()->to('/shopcar')->with('error', 'El carrito está vacío.');
    }

    $pedidoData = [
        'id_cliente' => $usuarioId,
        'estado' => 'Pendiente',
        'fecha' => date('Y-m-d H:i:s'),
        'total' => $carrito['total'],
        'metodo_pago' => $this->request->getPost('payment_method'),
        'id_tienda' => $id_tienda
    ];

    $this->db->transStart();

    try {
        $pedidoId = $pedidoModel->crearPedido($pedidoData);

        $detalles = [];
        foreach ($carrito['productos'] as $producto) {
            $detalles[] = [
                'id_pedido' => $pedidoId,
                'id_producto' => $producto['id_producto'],
                'cantidad' => $producto['cantidad'],
                'subtotal' => $producto['subtotal']
            ];
        }

        $pedidoModel->agregarDetallePedido($detalles);

        $carritoModel->eliminarCarrito($usuarioId);

        $this->db->transComplete();

        return redirect()->to('/shopcar')->with('success', 'Pedido confirmado y registrado exitosamente.');
    
    } catch (\Exception $e) {
        $this->db->transRollback();
        log_message('error', 'Error al confirmar pago: ' . $e->getMessage());
        return redirect()->to('/shopcar')->with('error', 'Ocurrió un error al procesar el pedido.');
    }
}
public function eliminarCarrito($usuarioId)
{
    $db = \Config\Database::connect();
    $ClientModel = new ClienteModel();

    $Cliente = $ClientModel->getClientbyUserId($usuarioId);

    if (!$Cliente || !isset($Cliente['id_cliente'])) {
        log_message('error', 'Cliente no encontrado: ' . json_encode($Cliente));
        return false;
    }

    $IdCliente = $Cliente['id_cliente'];

    try {
        $query = "DELETE FROM carrito WHERE id_cliente = ?";
        $result = $db->query($query, [$IdCliente]);

        if (!$result) {
            throw new \Exception('Error al ejecutar la consulta SQL.');
        }

        log_message('info', 'Carrito eliminado para id_cliente: ' . $IdCliente);
        return true;
    } catch (\Exception $e) {
        log_message('error', 'Error en eliminarCarrito: ' . $e->getMessage());
        return false;
    }
}

}
