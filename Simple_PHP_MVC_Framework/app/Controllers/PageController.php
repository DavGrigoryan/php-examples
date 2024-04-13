<?php

namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

class PageController
{
    // Homepage action
    public function indexAction(RouteCollection $routes): void
    {
        $routeToProduct = str_replace('{id}', 1, $routes->get('product')->getPath());

        require_once APP_ROOT . '/views/home.php';
    }
}