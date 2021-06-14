<?php

namespace app;

use app\Database;

class Router
{

    // public array $getRoutes = [];
    // public array $postRoutes = [];
    // public Database $db
    public $getRoutes = [];
    public $postRoutes = [];
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function resolve()
    {
        // $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
        $currentUrl = $_SERVER['REQUEST_URI'] ?? '/'; // VIRTUAL HOST
        if (strpos($currentUrl, '?') !== false) {
            $currentUrl = substr($currentUrl, 0, strpos($currentUrl, '?'));
        }
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if (!$fn) {
            echo 'Page not found';
            exit;
        }
        call_user_func($fn, $this);
    }

    public function renderView($view, $params = [])
    { // products/index

        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start(); // start caching of the output
        include_once __DIR__ . "/views/$view.php";
        $content = ob_get_clean(); // return that output and cleans the buffer
        include_once __DIR__ . "/views/_layout.php";

    }
}