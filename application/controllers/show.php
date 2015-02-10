<?php
class Show extends CI_Controller {
    function __construct()
    {
        parent::__construct();      
        $this->load->model('admin_model');
        $this->load->helper(array('url','form'));
    }

    function index()
    {
        $this->load->view('homepage');
    }

}