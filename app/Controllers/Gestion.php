<?php

namespace App\Controllers;
use App\Models\ProductoModel;

class Gestion extends BaseController
{
    public function index(): string
    {
        $productoModel = new ProductoModel();
        $productos = $productoModel->where('stock >', 0)->findAll();
        
        return view('gestion', ['productos' => $productos]);
    }

    // Mostrar producto en un modal
    public function verProducto($id_producto)
    {
        $productoModel = new ProductoModel();
        $producto = $productoModel->find($id_producto);  // Suponiendo que tienes un método en el modelo para esto
        return json_encode($producto);  // Enviar la respuesta como JSON para que el modal lo use
    }

    // Editar producto
    public function editarProducto()
    {
        $productoModel = new ProductoModel();

        // Obtener los datos del formulario
        $id = $this->request->getPost('id_producto');
        $nombre = $this->request->getPost('nombre_producto');
        $descripcion = $this->request->getPost('descripcion');
        $precio = $this->request->getPost('precio_base');
        $stock = $this->request->getPost('stock');

        // Actualizar los datos del producto
        $data = [
            'nombre_producto' => $nombre,
            'descripcion' => $descripcion,
            'precio_base' => $precio,
            'stock' => $stock
        ];

        $productoModel->update($id, $data);

        return $this->response->setJSON(['success' => true]);
    }

    // Eliminar producto
    public function eliminarProducto($id)
    {
        $productoModel = new ProductoModel();
        $productoModel->delete($id);

        return $this->response->setJSON(['success' => true]);
    }

    // Agregar un nuevo producto
    public function agregarProducto() 
    {
        $productoModel = new ProductoModel();

        // Obtener los datos del formulario
        $nombre = $this->request->getPost('nombre_producto');
        $descripcion = $this->request->getPost('descripcion');
        $precio = $this->request->getPost('precio_base');
        $stock = $this->request->getPost('stock');

        // Insertar el nuevo producto
        $data = [
            'nombre_producto' =>  $nombre,
            'descripcion' =>  $descripcion,
            'precio_base' =>  $precio,
            'stock' =>  $stock
        ];

        $productoModel->insert($data);

        return $this->response->setJSON(['success' => true]);
    }
}
