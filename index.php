<?php

define('ROOT_DIR', __DIR__);
define('ROOT_URL', dirname($_SERVER['SCRIPT_NAME']));

(function() {
    spl_autoload_register(function($name) {
        $fn = "inc/$name.php";
        if (file_exists($fn))
            require $fn;
    });
    
    function dd() {
        var_dump(func_get_args());
        exit;
    };
    
    function request($key, $default = '') {
        return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default;
    }

    require 'Controller.php';
    $controller = new Controller;
    $rv = $controller->dispatch($_SERVER['REQUEST_METHOD'], request('page'));
    echo $rv;
})();