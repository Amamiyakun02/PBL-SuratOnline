<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('isLogin') != true) {
            return redirect()->to(base_url('/'));
        }
    }

        // Variabel sesi yang diterapkan di semua halaman

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
//        if (session()->get('isLogin') == true) {
//            return redirect()->to(base_url('/dashboard'));
//        }
    }
}
