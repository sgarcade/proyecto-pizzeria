<?php namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

class Home extends BaseController
{
    public function index(): RedirectResponse
    {
        // Check if the user is logged in (session)
        if ($this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('home'));
        }

        // Render the home page for logged-in users
        return redirect()->to(base_url('home'));
    }
}

