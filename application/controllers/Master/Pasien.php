<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Data Pasien';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pasien'] = $this->db->get('masterdata_pasien')->result_array();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masterdata/pasien/index', $data);
        $this->load->view('templates/footer');
       
    }

    public function tambah() 
    {
        $data['title'] = 'Tambah Pasien';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_pasien','Nama Pasien','required|trim');
        $this->form_validation->set_rules('no_tlp','Nomor Telepon','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/pasien/tambah', $data);
            $this->load->view('templates/footer');

        } else {
            $query = "SELECT max(`id`) as kodeTerbesar
                            FROM `masterdata_pasien`";
            $data = $this->db->query($query)->result_array();
            foreach ($data as $d) {
                $dataPasien = $d['kodeTerbesar'];
            }
            $urutan = (int) substr($dataPasien, 0, 3);
            $urutan++;
            $huruf = "PS";

           
            // $kodeObat = $huruf . sprintf("%03s", $urutan);
            // $namaObat = $this->input->post('nama_obat');
            // $stok = $this->input->post('stok');
            // $kategori = $this->input->post('kategori');
            // $deskripsi = $this->input->post('deskripsi');
   
            $arraydata = [
                'kode_pasien' => $huruf . sprintf("%03s", $urutan),
                'nama_pasien' => $this->input->post('nama_pasien'),
                'gender' => $this->input->post('gender'),
                'no_tlp' => $this->input->post('no_tlp'),
            ];

            $this->db->insert('masterdata_pasien', $arraydata);
            $this->session->set_flashdata('massage', 'Data berhasil ditambahkan');
            redirect('master/pasien');
        }
    }


    public function edit($id)
    {
        $data['title'] = 'Edit Pasien';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit'] = $this->db->get_where('masterdata_pasien', ['id' => $id])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        
        $this->form_validation->set_rules('nama_pasien','Nama Pasien','required|trim');
        $this->form_validation->set_rules('no_tlp','Nomor Telepon','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/pasien/edit', $data);
            $this->load->view('templates/footer');

        } else {
            $nama_pasien = $this->input->post('nama_pasien');
            $gender = $this->input->post('gender');
            $no_tlp = $this->input->post('no_tlp');
            $deskripsi = $this->input->post('deskripsi');
   

            $this->db->set('nama_pasien', $nama_pasien);
            $this->db->set('gender', $gender);
            $this->db->set('no_tlp', $no_tlp);
            $this->db->where('id', $id);
            $this->db->update('masterdata_pasien');

            $this->session->set_flashdata('massage_edit', 'Data berhasil diedit');
            redirect('master/pasien');
        }

        
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('masterdata_pasien');

        $this->session->set_flashdata('massage_delete', 'Data berhasil dihapus');
            redirect('master/pasien');

    }
}