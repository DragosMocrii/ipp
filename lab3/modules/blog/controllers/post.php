<?php

class post extends rs_controller {

    public $name = 'post';

    function __construct() {
        parent::__construct();
        $this->load->model('blog', 'post_model');
        $this->load->model('blog', 'user_model');
    }

    function show() {
        $row = $this->post_model->get_post($this->router->params['id']);
        $post_author = $this->user_model->get_user_name($row['user_id']);
        $data = array(
            'post_author' => $post_author,
            'post_title' => $row['title'],
            'post_date' => date("g:i a F j, Y ", strtotime($row["date"])),
            'post_summary' => $row['summary']
        );
        $this->load->view('blog', 'show_single', $data);
    }

    function all() {
        $rows = $this->post_model->get_posts();
        $data = array(
            'posts' => $rows
        );
        $this->load->view('blog', 'show_all', $data);
    }

}
