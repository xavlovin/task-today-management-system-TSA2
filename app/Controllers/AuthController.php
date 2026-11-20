<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    /**
     * Shows the login form.
     * Route: GET /login
     */
    public function loginForm()
    {
        $userModel = new UserModel();

        $data = [
            'title'       => 'Login',
            'user'        => $userModel->getDemoUser(),
            'activeRoute' => '/login',
        ];

        return view('layouts/main', $data + ['content' => view('auth/login', $data)]);
    }

    /**
     * Checks the username and password and logs the user in.
     * Route: POST /login
     */
    public function login()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $user      = $userModel->where('username', $this->request->getPost('username'))->first();

        // One general message, so we never reveal which part was wrong.
        if (! $user || ! password_verify($this->request->getPost('password'), (string) $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid login details.');
        }

        // New session id after login, then remember who is logged in.
        session()->regenerate();
        session()->set([
            'user_id'   => $user['id'],
            'user_name' => $user['full_name'],
        ]);

        return redirect()->to('/tasks')->with('success', 'Welcome, ' . $user['full_name'] . '!');
    }

    /**
     * Logs the user out and goes back to the Welcome page.
     * Route: GET /logout
     */
    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }
}
