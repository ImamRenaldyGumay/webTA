<?php
class mentahan extends CI_Controller
{
    public function index()
    {
        $this->load->view('login');
    }

    public function regis()
    {
        $this->load->view('regis');
    }
}
