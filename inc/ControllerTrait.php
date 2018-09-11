<?php

trait ControllerTrait
{
    public function dispatch(string $method, string $page)
    {
        if ( ! $page) $page = 'index';
        
        $names = [
            strtolower($method) . '_' . $page,
            'any_' . $page,
            $page
        ];
        
        foreach ($names as $name) {
            if (method_exists($this, $name)) {
                return $this->{$name}();
            }
        }

        throw new RuntimeException("Method matching $method /$page not configured.");
    }
}