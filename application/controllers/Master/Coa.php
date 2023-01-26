<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Data COA';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['coa'] = $this->db->get('masterdata_coa')->result_array();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masterdata/coa/index', $data);
        $this->load->view('templates/footer');
       
    }

}