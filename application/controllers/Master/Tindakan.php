<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tindakan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Data Tindakan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tindakan'] = $this->db->get('masterdata_tindakan')->result_array();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masterdata/tindakan/index', $data);
        $this->load->view('templates/footer');
       
    }

    public function tambah() 
    {
        $data['title'] = 'Tambah Tindakan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_tindakan','Nama Tindakan','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/tindakan/tambah', $data);
            $this->load->view('templates/footer');

        } else {
            // $query = "SELECT max(`id`) as kodeTerbesar
            //                 FROM `masterdata_dokter`";
            // $data = $this->db->query($query)->result_array();
            // foreach ($data as $d) {
            //     $dataDokter = $d['kodeTerbesar'];
            // }
            // $urutan = (int) substr($dataDokter, 0, 3);
            // $urutan++;
            // $huruf = "DR";

           
            // $kodeObat = $huruf . sprintf("%03s", $urutan);
            // $namaObat = $this->input->post('nama_obat');
            // $stok = $this->input->post('stok');
            // $kategori = $this->input->post('kategori');
            // $deskripsi = $this->input->post('deskripsi');
   
            $arraydata = [
                'nama_tindakan' => $this->input->post('nama_tindakan')
            ];

            $this->db->insert('masterdata_tindakan', $arraydata);
            $this->session->set_flashdata('massage', 'Data berhasil ditambahkan');
            redirect('master/tindakan');
        }
    }


    public function edit($id)
    {
        $data['title'] = 'Edit Tindakan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit'] = $this->db->get_where('masterdata_tindakan', ['id' => $id])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        
        $this->form_validation->set_rules('nama_tindakan','Nama Tindakan','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/tindakan/edit', $data);
            $this->load->view('templates/footer');

        } else {
            $nama_tindakan = $this->input->post('nama_tindakan');

            $this->db->set('nama_tindakan', $nama_tindakan);
            $this->db->where('id', $id);
            $this->db->update('masterdata_tindakan');

            $this->session->set_flashdata('massage_edit', 'Data berhasil diedit');
            redirect('master/tindakan');
        }

        
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('masterdata_tindakan');

        $this->session->set_flashdata('massage_delete', 'Data berhasil dihapus');
            redirect('master/tindakan');

    }
}