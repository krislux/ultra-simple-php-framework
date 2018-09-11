<?php

class View
{
    private $args;
    private $filename;

    public function __construct(string $name, array $args = [])
    {
        $this->args = $args;
        $this->filename = ROOT_DIR . '/views/' . $name . '.php';
        if ( ! file_exists($this->filename)) {
            throw new RuntimeException("View template {$this->filename} not found.");
        }
    }

    public function __toString()
    {
        ob_start();
        extract($this->args);
        require $this->filename;
        $buffer = ob_get_clean();

        if (isset($layout)) {
            $this->args['content'] = $buffer . PHP_EOL;
            $buffer = (string)new self('layouts/' . $layout, $this->args);
        }

        return $buffer;
    }
}