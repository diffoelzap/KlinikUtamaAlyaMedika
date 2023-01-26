<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Data Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['obat'] = $this->db->get('masterdata_obat')->result_array();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masterdata/obat/index', $data);
        $this->load->view('templates/footer');
       
    }

    public function tambah() 
    {
        $data['title'] = 'Tambah Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_obat','Nama Obat','required|trim');
        $this->form_validation->set_rules('stok','Stok','required|trim');
        $this->form_validation->set_rules('kategori','Kategori','required|trim');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/obat/tambah', $data);
            $this->load->view('templates/footer');

        } else {
            $query = "SELECT max(`id`) as kodeTerbesar
                            FROM `masterdata_obat`";
            $data = $this->db->query($query)->result_array();
            foreach ($data as $d) {
                $dataObat = $d['kodeTerbesar'];
            }
            $urutan = (int) substr($dataObat, 0, 3);
            $urutan++;
            $huruf = "OB";

           
            // $kodeObat = $huruf . sprintf("%03s", $urutan);
            // $namaObat = $this->input->post('nama_obat');
            // $stok = $this->input->post('stok');
            // $kategori = $this->input->post('kategori');
            // $deskripsi = $this->input->post('deskripsi');
   
            $arraydata = [
                'kode_obat' => $huruf . sprintf("%03s", $urutan),
                'nama_obat' => $this->input->post('nama_obat'),
                'stok' => $this->input->post('stok'),
                'kategori' => $this->input->post('kategori'),
                'deskripsi' => $this->input->post('deskripsi')
            ];

            $this->db->insert('masterdata_obat', $arraydata);
            $this->session->set_flashdata('massage', 'Data berhasil ditambahkan');
            redirect('master/obat');
        }
    }


    public function edit($id)
    {
        $data['title'] = 'Edit Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit'] = $this->db->get_where('masterdata_obat', ['id' => $id])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        
        $this->form_validation->set_rules('nama_obat','Nama Obat','required|trim');
        $this->form_validation->set_rules('stok','Stok','required|trim');
        $this->form_validation->set_rules('kategori','Kategori','required|trim');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/obat/edit', $data);
            $this->load->view('templates/footer');

        } else {
            $namaObat = $this->input->post('nama_obat');
            $stok = $this->input->post('stok');
            $kategori = $this->input->post('kategori');
            $deskripsi = $this->input->post('deskripsi');
   

            $this->db->set('nama_obat', $namaObat);
            $this->db->set('stok', $stok);
            $this->db->set('kategori', $kategori);
            $this->db->set('deskripsi', $deskripsi);
            $this->db->where('id', $id);
            $this->db->update('masterdata_obat');

            $this->session->set_flashdata('massage_edit', 'Data berhasil diedit');
            redirect('master/obat');
        }

        
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('masterdata_obat');

        $this->session->set_flashdata('massage_delete', 'Data berhasil dihapus');
            redirect('master/obat');

    }
}