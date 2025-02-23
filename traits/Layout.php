<?php 

namespace traits;

trait Layout
{
    private $path;

    private function getLayout($view, $controller = null, $layout = 'default')
    {
        if ($controller === null) {
            $this->path = "app/views/$view.php";
        } else {
            $this->path = "app/views/$controller/$view.php";
        }
       
        return require "app/views/layouts/$layout.php";
    }
}