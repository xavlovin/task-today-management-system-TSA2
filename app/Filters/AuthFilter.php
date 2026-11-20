<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    // Runs before a protected route. If nobody is logged in, send them to the login page.
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! session()->get('user_id')) {
            // 302 is set on purpose: for POST requests CodeIgniter would otherwise use 303.
            return redirect()->to('/login', 302)->with('error', 'Please log in first.');
        }
    }

    // Nothing to do after the request.
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
