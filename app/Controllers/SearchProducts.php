<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class SearchProducts extends Controller
{
    public function index()
    {
        // Cargar la vista 'searchproducts'
        return view('searchproducts');
    }
}
