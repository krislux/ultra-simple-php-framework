<?php

define('ROOT_DIR', __DIR__);

spl_autoload_register(function($name) {
    require "inc/$name.php";
});

function dd() {
    var_dump(func_get_args());
    exit;
};

function request($key, $default = '') {
    return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default;
}

(function() {
    require 'Controller.php';
    $controller = new Controller;
    $rv = $controller->dispatch($_SERVER['REQUEST_METHOD'], request('page'));
    echo $rv;
})();