<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class PaymentGetaway extends Controller
{
    public function index()
    {
        // Cargar la vista 'searchproducts'
        return view('paymentGetaway');
    }
}
