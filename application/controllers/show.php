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

    function article()
    {
        $this->load->view('article');
    }

    function articlelist()
    {
        $this->load->view('articlelist');
    }
    function files()
    {
        $this->load->view('');
    }
}