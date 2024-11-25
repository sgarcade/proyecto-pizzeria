<?php

namespace App\Models;

use CodeIgniter\Model;

class SearchProductsModel extends Model
{
    protected $table = 'producto'; 
    protected $primaryKey = 'id_producto'; 
    protected $allowedFields = ['id_producto', 'nombre_producto', 'descripcion', 'precio_base'];

    /**
     * Obtener todos los productos
     *
     * @return array Lista de productos
     */
    public function getAllProducts()
    {
        return $this->findAll();
    }

    /**
     * Buscar productos por nombre o descripción
     *
     * @param string $keyword Palabra clave para buscar
     * @return array Productos coincidentes
     */
    public function searchProducts($keyword)
    {
        return $this->like('nombre_producto', $keyword)
                    ->orLike('descripcion', $keyword)
                    ->findAll();
    }

    /**
     * Buscar productos por categoría
     *
     * @param string $categoria Categoría del producto
     * @return array Productos coincidentes
     */
    public function getProductsByCategory($categoria)
    {
        return $this->where('categoria', $categoria)->findAll();
    }

    /**
     * Buscar productos disponibles
     *
     * @return array Productos que están disponibles
     */
    
}
