<?php

class Routeur
{
    private $request;
    private $routes = [
        '' => 'home',
        'home.html' => 'home',
        'home.php' => 'home',
        'create.html' => 'create',
        'create.php' => 'create',
        'edit.html' => 'edit',
        'edit.php' => 'edit',
        'dark.html' => 'dark',
        'dark.php' => 'dark',
        'light.html' => 'light',
        'light.php' => 'light',
        'delete.html' => 'delete',
        'delete.php' => 'delete',
        'update.html' => 'update',
        'update.php' => 'update',
    ];

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function renderController()
    {
        $request = $this->request;

        if (key_exists($request, $this->routes)) {
            $route = $this->routes[$request];
            require CONTROLLERS_PATH . $route . ".php";
        } else {
            echo '404';
        }
    }
}