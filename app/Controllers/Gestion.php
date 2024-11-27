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

    
    public function verProducto($id_producto)
    {
        $productoModel = new ProductoModel();
        $producto = $productoModel->find($id_producto); 

        return json_encode($producto);  
    }


    public function editarProducto()
    {    
        var_dump($this->request->getPost());
        exit;
        $productoModel = new ProductoModel();
        
        $id = $this->request->getPost('id_producto');
        $nombre = $this->request->getPost('nombre_producto');
        $descripcion = $this->request->getPost('descripcion');
        $precio = $this->request->getPost('precio_base');
        $stock = $this->request->getPost('stock');
        
        $data = [
            'nombre_producto' => $nombre,
            'descripcion' => $descripcion,
            'precio_base' => $precio,
            'stock' => $stock
        ];
        
        if ($productoModel->update($id, $data)) {
            return redirect()->to('/gestion')->with('success', 'Producto actualizado correctamente');
        } else {
            return redirect()->to('/gestion')->with('error', 'Error al actualizar el producto');
        }
    }
    
    


    public function eliminarProducto()
    {
        
        $productoModel = new ProductoModel();
        $id = $this->request->getPost('id_producto');
    
        if ($productoModel->delete($id)) {
            return redirect()->to('/gestion')->with('success', 'Producto eliminado correctamente');
        } else {
            return redirect()->to('/gestion')->with('error', 'Error al eliminar el producto');
        }
    }
    


    public function agregarProducto() 
    {
        $productoModel = new ProductoModel();
    
        $nombre = $this->request->getPost('nombre_producto');
        $descripcion = $this->request->getPost('descripcion');
        $precio = $this->request->getPost('precio_base');
        $sabor = $this->request->getPost('sabor');
        $stock = $this->request->getPost('stock');
    
        $data = [
            'nombre_producto' =>  $nombre,
            'descripcion' =>  $descripcion,
            'sabor' =>  $sabor,
            'precio_base' =>  $precio,
            'stock' =>  $stock
        ];
    
        if ($productoModel->insert($data)) {
            return redirect()->to('/gestion')->with('success', 'Producto agregado correctamente');
        } else {
            return redirect()->to('/gestion')->with('error', 'Error al agregar el producto');
        }
    }
    
    
}
