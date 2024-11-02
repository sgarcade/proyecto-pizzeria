<?php

namespace App\Controllers;

class OlvidoContrasena extends BaseController
{
    public function index(): string
    {
        return view('olvidoContrasena');
    }
}
