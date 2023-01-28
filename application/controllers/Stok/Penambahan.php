<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penambahan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Obat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penambahan'] = $this->db->query('SELECT 
                                                    transaksi_obat_masuk.id,
                                                    transaksi_obat_masuk.kode_transaksi,
                                                    transaksi_obat_masuk.harga,
                                                    transaksi_obat_masuk.harga_total,
                                                    masterdata_obat.nama_obat,
                                                    masterdata_supplier.nama_supplier,
                                                    transaksi_obat_masuk.jumlah,
                                                    transaksi_obat_masuk.tanggal_masuk,
                                                    transaksi_obat_masuk.tanggal_expired,
                                                    masterdata_obat.harga FROM transaksi_obat_masuk 
                                                JOIN masterdata_obat ON masterdata_obat.id = transaksi_obat_masuk.id_obat
                                                JOIN masterdata_supplier ON masterdata_supplier.id = transaksi_obat_masuk.id_supplier')->result_array();
        $data['obat'] = $this->db->query('SELECT * FROM masterdata_obat WHERE id != 0')->result_array();
        $data['supplier'] = $this->db->get('masterdata_supplier')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok/penambahan/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function tambah()
    {
        
        $this->form_validation->set_rules('jumlah','Jumlah','required|trim');
        $this->form_validation->set_rules('tanggal_masuk','Jumlah','required|trim');
        $this->form_validation->set_rules('tanggal_expired','Jumlah','required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Data harus disi');
            redirect('stok/penambahan');
        } else {
            $query = "SELECT max(`id`) as kodeTerbesar
                            FROM `transaksi_obat_masuk`";
            $data = $this->db->query($query)->result_array();
            foreach ($data as $d) {
                $dataStok = $d['kodeTerbesar'];
            }
            $urutan = (int) substr($dataStok, 0, 3);
            $urutan++;
            $huruf = "OBM";

            
            // $kodeObat = $huruf . sprintf("%03s", $urutan);
            // $namaObat = $this->input->post('nama_obat');
            // $stok = $this->input->post('stok');
            // $kategori = $this->input->post('kategori');
            // $deskripsi = $this->input->post('deskripsi');
            $id_obat = $this->input->post('id_obat');
            $jumlah = $this->input->post('jumlah');
            $queryHarga = $this->db->query("SELECT stok,harga FROM masterdata_obat WHERE id = '$id_obat'")->row_array();
            $stok = $queryHarga['stok'];
            $tambahStok = $stok + $jumlah; 
            $arraydata = [
                'kode_transaksi' => $huruf . sprintf("%03s", $urutan),
                'id_obat' => $this->input->post('id_obat'),
                'id_supplier' => $this->input->post('id_supplier'),
                'harga' => $queryHarga['harga'],
                'harga_total' => $jumlah * $queryHarga['harga'],
                'jumlah' => $jumlah,
                'tanggal_masuk' => $this->input->post('tanggal_masuk'),
                'tanggal_expired' => $this->input->post('tanggal_expired'),
            ];

            $this->db->set('stok', $tambahStok);
            $this->db->where('id', $id_obat);
            $this->db->update('masterdata_obat');

            $this->db->insert('transaksi_obat_masuk', $arraydata);
            $this->session->set_flashdata('massage', 'Data berhasil ditambahkan');
            redirect('stok/penambahan');
        }
    }

    public function info($id) 
    {
        $data['title'] = 'Detail Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['info'] = $this->db->get_where('transaksi_obat_masuk', ['id' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok/penambahan/info', $data);
        $this->load->view('templates/footer');

    }
}