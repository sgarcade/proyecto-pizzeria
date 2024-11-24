<?php
require_once 'models/ProductModel.php';

class ProductController {
    private $model;

    public function __construct($db) {
        $this->model = new ProductModel($db);
    }

    
    public function search($searchTerm = '') {
       
        if (!empty($searchTerm)) {
            $products = $this->model->searchProducts($searchTerm);
        } else {
            $products = []; 
        }

        
        require_once 'views/productSearchView.php';
    }
}
?>
