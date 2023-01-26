<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Data Kamar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kamar'] = $this->db->get('masterdata_kamar')->result_array();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masterdata/kamar/index', $data);
        $this->load->view('templates/footer');
       
    }

    public function tambah() 
    {
        $data['title'] = 'Tambah Kamar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_kamar','Nama Dokter','required|trim');
        $this->form_validation->set_rules('jumlah','Jumlah','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/kamar/tambah', $data);
            $this->load->view('templates/footer');

        } else {
            $query = "SELECT max(`id`) as kodeTerbesar
                            FROM `masterdata_kamar`";
            $data = $this->db->query($query)->result_array();
            foreach ($data as $d) {
                $dataKamar = $d['kodeTerbesar'];
            }
            $urutan = (int) substr($dataKamar, 0, 3);
            $urutan++;
            $huruf = "KM";

           
            // $kodeObat = $huruf . sprintf("%03s", $urutan);
            // $namaObat = $this->input->post('nama_obat');
            // $stok = $this->input->post('stok');
            // $kategori = $this->input->post('kategori');
            // $deskripsi = $this->input->post('deskripsi');
   
            $arraydata = [
                'kode_kamar' => $huruf . sprintf("%03s", $urutan),
                'nama_kamar' => $this->input->post('nama_kamar'),
                'tipe_kamar' => $this->input->post('tipe_kamar'),
                'jumlah' => $this->input->post('jumlah'),
            ];

            $this->db->insert('masterdata_kamar', $arraydata);
            $this->session->set_flashdata('massage', 'Data berhasil ditambahkan');
            redirect('master/kamar');
        }
    }


    public function edit($id)
    {
        $data['title'] = 'Edit Kamar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit'] = $this->db->get_where('masterdata_kamar', ['id' => $id])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        
        $this->form_validation->set_rules('nama_kamar','Nama Dokter','required|trim');
        $this->form_validation->set_rules('tipe_kamar','Tipe Kamar','required|trim');
        $this->form_validation->set_rules('jumlah','Jumlah','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/kamar/edit', $data);
            $this->load->view('templates/footer');

        } else {
            $nama_kamar = $this->input->post('nama_kamar');
            $tipe_kamar = $this->input->post('tipe_kamar');
            $jumlah = $this->input->post('jumlah');
   

            $this->db->set('nama_kamar', $nama_kamar);
            $this->db->set('tipe_kamar', $tipe_kamar);
            $this->db->set('jumlah', $jumlah);
            $this->db->where('id', $id);
            $this->db->update('masterdata_kamar');

            $this->session->set_flashdata('massage_edit', 'Data berhasil diedit');
            redirect('master/kamar');
        }

        
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('masterdata_kamar');

        $this->session->set_flashdata('massage_delete', 'Data berhasil dihapus');
            redirect('master/kamar');

    }
}