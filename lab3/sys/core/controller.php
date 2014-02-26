<?php

class rs_controller {

    private static $instance;
    private static $loaded_loaded = FALSE;
    public $name = 'parent';

    function __construct() {
        if (self::$loaded_loaded === FALSE) {
            self::$instance = & $this;
            self::$loaded_loaded = TRUE;
        }
        $this->load = &load('rs_loader', SYS . '/core');
    }

    public static function &get_instance() {
        return self::$instance;
    }

}
