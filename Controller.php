<?php

class Controller
{
    use ControllerTrait;

    public function get_index()
    {
        return new View('home');
    }
}