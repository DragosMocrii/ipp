<?php

class post_manage extends rs_controller {

    function __construct() {
        parent::__construct();
        $this->load->model('blog', 'post_model');
        authentificate();
    }

    function index() {
        echo 'Index of post_manage';
    }

    function add_post() {
        $data = array();
        if (isset($_POST['submit'])) {
            $this->post_model->add_post(1, $_POST['post_title'], $_POST['post_summary']);
            $data['post_added'] = TRUE;
        }
        $this->load->view('admin', 'post_add', $data);
    }

    function delete_posts() {
        $data = array();
        if (isset($_POST['submit'])) {
            if (isset($_POST['post_id'])) {
                $this->post_model->delete_post($_POST['post_id']);
                $data['deleted_post'] = TRUE;
            }
        }
        $rows = $this->post_model->get_posts();
        $data ['posts'] = $rows;
        $this->load->view('admin', 'delete_posts', $data);
    }

}
