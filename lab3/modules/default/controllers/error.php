<?php

class error extends rs_controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view('default', 'default_error');
    }

}
