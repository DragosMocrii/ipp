<?php

class router {

    public $module;
    public $controller;
    public $action;
    public $params = array();
    public $current_controller;

    function __construct() {
        $request_uri = ltrim($_SERVER['REQUEST_URI'], '/');
        if (!in_array($request_uri, array('', 'index.php'))) {
            $bits = explode('/', $request_uri);
            if (count($bits) >= 2) {
                $this->module = $bits[0];
                $this->controller = $bits[1];
                $this->action = !empty($bits[2]) ? $bits[2] : 'index';
                for ($i = 3; $i < count($bits); $i = $i + 2) {
                    if (empty($bits[$i]) || !isset($bits[$i + 1]))
                        break;
                    $this->params[$bits[$i]] = $bits[$i + 1];
                }
            }
        } else {
            $this->module = DEFAULT_MODULE;
            $this->controller = DEFAULT_CONTROLLER;
            $this->action = DEFAULT_ACTION;
            $this->params = array();
        }
    }

    function initialize() {
        $error_flag = FALSE;
        if (file_exists(MODS . '/' . $this->module)) {
            if (file_exists(MODS . '/' . $this->module . '/controllers/' . $this->controller . '.php')) {
                require_once(MODS . '/' . $this->module . '/controllers/' . $this->controller . '.php');
                $this->current_controller = new $this->controller();
                $this->current_controller->router = &$this;
                if (!isset($this->action) || empty($this->action))
                    $this->action = 'index';
                if (method_exists($this->current_controller, $this->action)) {
                    $this->current_controller->{$this->action}();
                    return;
                }
                else
                    $error_flag = TRUE;
            }
            else
                $error_flag = TRUE;
        }
        else
            $error_flag = TRUE;
        if ($error_flag) {
            $this->show_error();
        }
    }

    function show_error() {
        $this->module = DEFAULT_MODULE;
        $this->controller = 'error';
        $this->action = '';
        $this->params = array();
        $this->initialize();
    }

}
