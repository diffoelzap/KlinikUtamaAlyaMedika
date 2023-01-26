<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Data Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['supplier'] = $this->db->get('masterdata_supplier')->result_array();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masterdata/supplier/index', $data);
        $this->load->view('templates/footer');
       
    }

    public function tambah() 
    {
        $data['title'] = 'Tambah Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_supplier','Nama Supplier','required|trim');
        $this->form_validation->set_rules('no_tlp','Nomor Telepon','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/supplier/tambah', $data);
            $this->load->view('templates/footer');

        } else {
            $query = "SELECT max(`id`) as kodeTerbesar
                            FROM `masterdata_supplier`";
            $data = $this->db->query($query)->result_array();
            foreach ($data as $d) {
                $dataSupplier = $d['kodeTerbesar'];
            }
            $urutan = (int) substr($dataSupplier, 0, 3);
            $urutan++;
            $huruf = "SP";

           
            // $kodeObat = $huruf . sprintf("%03s", $urutan);
            // $namaObat = $this->input->post('nama_obat');
            // $stok = $this->input->post('stok');
            // $kategori = $this->input->post('kategori');
            // $deskripsi = $this->input->post('deskripsi');
   
            $arraydata = [
                'kode_supplier' => $huruf . sprintf("%03s", $urutan),
                'nama_supplier' => $this->input->post('nama_supplier'),
                'no_tlp' => $this->input->post('no_tlp'),
            ];

            $this->db->insert('masterdata_supplier', $arraydata);
            $this->session->set_flashdata('massage', 'Data berhasil ditambahkan');
            redirect('master/supplier');
        }
    }


    public function edit($id)
    {
        $data['title'] = 'Edit Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit'] = $this->db->get_where('masterdata_supplier', ['id' => $id])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        
        $this->form_validation->set_rules('nama_supplier','Nama Supplier','required|trim');
        $this->form_validation->set_rules('no_tlp','Nomor Telepon','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/supplier/edit', $data);
            $this->load->view('templates/footer');

        } else {
            $nama_supplier = $this->input->post('nama_supplier');
            $no_tlp = $this->input->post('no_tlp');
   

            $this->db->set('nama_supplier', $nama_supplier);
            $this->db->set('no_tlp', $no_tlp);
            $this->db->where('id', $id);
            $this->db->update('masterdata_supplier');

            $this->session->set_flashdata('massage_edit', 'Data berhasil diedit');
            redirect('master/supplier');
        }

        
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('masterdata_supplier');

        $this->session->set_flashdata('massage_delete', 'Data berhasil dihapus');
            redirect('master/supplier');

    }
}