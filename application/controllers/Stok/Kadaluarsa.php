<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kadaluarsa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {   
        $dateNow = date('Y-m-d');
        $data['title'] = 'Obat Kadaluarsa';
        $data['titleObat'] = 'Data Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['obat'] = $this->db->query("SELECT * FROM masterdata_obat 
                                                    JOIN transaksi_obat_masuk ON transaksi_obat_masuk.id_obat = masterdata_obat.id 
                                                    WHERE 
                                                    transaksi_obat_masuk.active = 1 AND
                                                    transaksi_obat_masuk.tanggal_expired < '$dateNow'")->result_array();
        $data['kadaluarsa'] = $this->db->query("SELECT masterdata_obat.kode_obat,
                                                       masterdata_obat.nama_obat,
                                                       masterdata_obat.stok,
                                                       masterdata_obatkadaluarsa.tanggal_dikeluarkan
                                                    FROM masterdata_obatkadaluarsa
                                                        JOIN masterdata_obat ON masterdata_obat.id = masterdata_obatkadaluarsa.id_obat")->result_array();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok/kadaluarsa/index', $data);
        $this->load->view('templates/footer');
       
    }

    public function tambah() 
    {
        $data['title'] = 'Tambah Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_obat','Nama Obat','required|trim');
        $this->form_validation->set_rules('harga','Harga Obat','required|trim');
        $this->form_validation->set_rules('kategori','Kategori','required|trim');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('stok/obat/tambah', $data);
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
                'stok' => 0,
                'harga' => $this->input->post('harga'),
                'kategori' => $this->input->post('kategori'),
                'deskripsi' => $this->input->post('deskripsi')
            ];

            $this->db->insert('masterdata_obat', $arraydata);
            $this->session->set_flashdata('massage', 'Data berhasil ditambahkan');
            redirect('stok/obat');
        }
    }

    
    public function edit($id)
    {
            $query = $this->db->query("SELECT   masterdata_obat.kode_obat,
                                                masterdata_obat.nama_obat,
                                                masterdata_obat.stok
                                            FROM masterdata_obat WHERE masterdata_obat.id = '$id'")
                                                ->row_array();
            $arraydata = [
                'id_obat' => $id,
                'tanggal_dikeluarkan' => date('Y-m-d'),
            ];
            // $this->db->set('active',0);
            // $this->db->where('id_obat', $id);
            // $this->db->update('transaksi_obat_masuk');
            $this->db->insert('masterdata_obatkadaluarsa', $arraydata);

            $this->session->set_flashdata('success', 'Obat berhasil dikeluarkan');
            redirect('stok/kadaluarsa');
        
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('masterdata_obat');

        $this->session->set_flashdata('massage_delete', 'Data berhasil dihapus');
            redirect('stok/obat');

    }

    public function info($id) 
    {
        $data['title'] = 'Detail Stok Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['info'] = $this->db->get_where('masterdata_obat', ['id' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok/obat/info', $data);
        $this->load->view('templates/footer');

    }
    
    public function kembali() {
        redirect('stok/obat');
    }
}