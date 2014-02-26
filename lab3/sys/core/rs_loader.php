<?php

class rs_loader {

    function __construct() {
        
    }

    function model($module, $model) {
        $rs = &get_instance();
        if (!property_exists($rs, $model)) {
            $rs->$model = &load($model, MODS . '/' . $module . '/models');
        }
    }

    function view($_module_, $_name_, $_data_ = array(), $_ret_ = FALSE) {
        extract($_data_);
        ob_start();
        require( MODS . '/' . $_module_ . '/views/' . $_name_ . '.php');
        $buffer = ob_get_clean();
        if ($_ret_ === TRUE)
            return $buffer;
        else
            echo $buffer;
    }

}