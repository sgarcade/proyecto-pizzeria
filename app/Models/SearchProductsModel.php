<?php

class ProductModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Método para buscar productos por nombre o categoría
    public function searchProducts($searchTerm) {
        $searchTerm = "%" . $searchTerm . "%"; // Se prepara el término para la búsqueda
        $sql = "SELECT * FROM productos WHERE nombre LIKE ? OR categoria LIKE ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC); // Retorna todos los productos encontrados
    }
}
?>
