<?php

namespace App\Controllers;

class Servicios extends BaseController
{
    public function index(): string
    {
        return view('services');
    }
}