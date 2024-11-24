<?php

namespace App\Controllers;

use App\Models\CarritoModel;

class CarritoController extends BaseController
{
    public function index()
    {
        // Aquí podrías cargar un modelo que maneje los datos del carrito
        $carritoModel = new CarritoModel();

        // Obtener los productos del carrito del usuario (esto dependerá de tu lógica)
        // Supongamos que tienes un carrito con productos guardados en la base de datos
        $productosCarrito = $carritoModel->getProductosCarrito(); // Método hipotético

        // Aquí calculamos el total y otros detalles del carrito si es necesario
        $totalCarrito = 0;
        foreach ($productosCarrito as $producto) {
            $totalCarrito += $producto['precio'] * $producto['cantidad'];
        }

        $data = [
            'productos' => $productosCarrito,
            'totalCarrito' => $totalCarrito
        ];

        return view('carrito_view', $data);
    }

    // Método para agregar productos al carrito (por ejemplo)
    public function agregar($productoId)
    {
        $carritoModel = new CarritoModel();

        // Lógica para agregar un producto al carrito
        // Se asume que hay un método que maneja la adición de productos
        $carritoModel->agregarAlCarrito($productoId);

        // Redirige a la página del carrito después de agregar el producto
        return redirect()->to('/carrito');
    }

    // Método para eliminar productos del carrito
    public function eliminar($productoId)
    {
        $carritoModel = new CarritoModel();

        // Lógica para eliminar un producto del carrito
        $carritoModel->eliminarDelCarrito($productoId);

        // Redirige a la página del carrito después de eliminar el producto
        return redirect()->to('/carrito');
    }
}
