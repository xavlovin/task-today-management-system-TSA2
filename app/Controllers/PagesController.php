<?php

namespace App\Controllers;

use App\Models\UserModel;

class PagesController extends BaseController
{
    /**
     * About page — developer info and system overview.
     * Route: /about
     */
    public function about()
    {
        $userModel = new UserModel();
        $user = $userModel->getDemoUser();

        // Developer details shown on the About page — edit these to match your submission.
        $developer = [
            'name'      => 'Prince Xavier M. Alcantara',
            'section'   => 'TB31',
            'professor' => 'Joseph Calleja',
            'github'    => 'https://github.com/xavlovin/task-today-management-system',
        ];

        $data = [
            'title'       => 'About',
            'user'        => $user,
            'developer'   => $developer,
            'activeRoute' => '/about',
        ];

        return view('layouts/main', $data + ['content' => view('pages/about', $data)]);
    }
}
