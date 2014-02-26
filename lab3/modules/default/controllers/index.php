<?php

class index extends rs_controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view('default', 'default_view');
    }

}
