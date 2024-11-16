<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Shopcar extends Controller
{
    public function index()
    {
        // Cargar la vista 'searchproducts'
        return view('shopcar');
    }
}
