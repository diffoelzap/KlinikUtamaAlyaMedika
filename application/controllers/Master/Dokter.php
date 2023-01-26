<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Data Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dokter'] = $this->db->get('masterdata_dokter')->result_array();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masterdata/dokter/index', $data);
        $this->load->view('templates/footer');
       
    }

    public function tambah() 
    {
        $data['title'] = 'Tambah Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_dokter','Nama Dokter','required|trim');
        $this->form_validation->set_rules('spesialis','Spesialis','required|trim');
        $this->form_validation->set_rules('no_tlp','Nomor Telepon','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/dokter/tambah', $data);
            $this->load->view('templates/footer');

        } else {
            $query = "SELECT max(`id`) as kodeTerbesar
                            FROM `masterdata_dokter`";
            $data = $this->db->query($query)->result_array();
            foreach ($data as $d) {
                $dataDokter = $d['kodeTerbesar'];
            }
            $urutan = (int) substr($dataDokter, 0, 3);
            $urutan++;
            $huruf = "DR";

           
            // $kodeObat = $huruf . sprintf("%03s", $urutan);
            // $namaObat = $this->input->post('nama_obat');
            // $stok = $this->input->post('stok');
            // $kategori = $this->input->post('kategori');
            // $deskripsi = $this->input->post('deskripsi');
   
            $arraydata = [
                'kode_dokter' => $huruf . sprintf("%03s", $urutan),
                'nama_dokter' => $this->input->post('nama_dokter'),
                'spesialis' => $this->input->post('spesialis'),
                'no_tlp' => $this->input->post('no_tlp'),
            ];

            $this->db->insert('masterdata_dokter', $arraydata);
            $this->session->set_flashdata('massage', 'Data berhasil ditambahkan');
            redirect('master/dokter');
        }
    }


    public function edit($id)
    {
        $data['title'] = 'Edit Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit'] = $this->db->get_where('masterdata_dokter', ['id' => $id])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        
        $this->form_validation->set_rules('nama_dokter','Nama Dokter','required|trim');
        $this->form_validation->set_rules('spesialis','Spesialis','required|trim');
        $this->form_validation->set_rules('no_tlp','Nomor Telepon','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/dokter/edit', $data);
            $this->load->view('templates/footer');

        } else {
            $nama_dokter = $this->input->post('nama_dokter');
            $spesialis = $this->input->post('spesialis');
            $no_tlp = $this->input->post('no_tlp');
   

            $this->db->set('nama_dokter', $nama_dokter);
            $this->db->set('spesialis', $spesialis);
            $this->db->set('no_tlp', $no_tlp);
            $this->db->where('id', $id);
            $this->db->update('masterdata_dokter');

            $this->session->set_flashdata('massage_edit', 'Data berhasil diedit');
            redirect('master/dokter');
        }

        
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('masterdata_dokter');

        $this->session->set_flashdata('massage_delete', 'Data berhasil dihapus');
            redirect('master/dokter');

    }
}