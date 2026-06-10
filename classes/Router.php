<?php
class Router
{
    private $request;
    private $routes = [
        '' => ['controller' => 'Home', 'method' => 'showHome'],
        'home.html' => ['controller' => 'Home', 'method' => 'showHome'],
        'create.html' => ['controller' => 'Home', 'method' => 'showCreate'],
        'edit.html' => ['controller' => 'Home', 'method' => 'showEdit'],
        'dark.html' => ['controller' => 'Home', 'method' => 'showDark'],
        'light.html' => ['controller' => 'Home', 'method' => 'showLight'],
        'delete.html' => ['controller' => 'Home', 'method' => 'showDelete'],
        'update.html' => ['controller' => 'Home', 'method' => 'showUpdate'],
        'home.php' => 'home',
        'create.php' => 'create',
        'edit.php' => 'edit',
        'dark.php' => 'dark',
        'light.php' => 'light',
        'delete.php' => 'delete',
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
            $controller = $this->routes[$request]['controller'];
            $method = $this->routes[$request]['method'];

            $currentController = new $controller();
            $currentController->$method();
        } else {
            echo '404';
        }
    }
}