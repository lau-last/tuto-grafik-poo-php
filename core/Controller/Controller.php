<?php

namespace Core\Controller;

abstract class Controller
{
    protected string $viewPath;
    protected string $template;

    public function render($view)
    {
        ob_start();
        $view = $this->viewPath . str_replace('.', '/', $view) . '.php';
        $content = ob_get_clean();
        require $this->viewPath . 'templates/' . $this->template . '.php';
    }
}