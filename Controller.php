<?php

namespace base;

use base\traits\Layout;

class Controller
{
    public $isUser = false;
    protected $layout = 'default';
    protected $controller = 'site';
    protected $jsonHeader = false;
    protected $post;
    protected $session;
    private $path;
    private $nameView;
    private $paramsAction = [];

    use Layout;

    public function __construct()
    {
        $this->post = (object)$_POST;
        $this->session = $_SESSION;

        if ($this->session) {
            $this->isUser = true;
        }
    }

    protected function render($name, $params = []) : void
    {
        $this->nameView = $name;
        
        if (count($params) > 0) {
            $this->paramsAction = $params;
        }
        
        $this->getLayout($this->nameView, $this->controller, $this->layout);
        
        //$this->params = $params;
    }

    protected function jsonResponse($data) : void
    {
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    protected function jsonHeader()
    {
        header('Content-Type: application/json; charset=utf-8');
    }

    protected function redirect($path)
    {
        header("Location: $path");
    }
}