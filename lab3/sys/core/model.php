<?php

class rs_model {

    function __get($name) {
        $rs = & get_instance();
        return $rs->$name;
    }

}
