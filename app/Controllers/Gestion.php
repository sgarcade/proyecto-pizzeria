<?php

namespace App\Controllers;

class Gestion extends BaseController
{
    public function index(): string
    {
        return view('gestion');
    }
}