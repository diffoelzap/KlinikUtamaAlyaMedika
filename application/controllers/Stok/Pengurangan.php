<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengurangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Obat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengurangan'] = $this->db->query('SELECT 
                                                    transaksi_obat_keluar.id,
                                                    transaksi_obat_keluar.kode_transaksi,
                                                    transaksi_obat_keluar.harga,
                                                    transaksi_obat_keluar.harga_total,
                                                    masterdata_obat.nama_obat,
                                                    masterdata_pasien.nama_pasien,
                                                    transaksi_obat_keluar.jumlah,
                                                    transaksi_obat_keluar.tanggal_keluar,
                                                    masterdata_obat.harga FROM transaksi_obat_keluar 
                                                JOIN masterdata_obat ON masterdata_obat.id = transaksi_obat_keluar.id_obat
                                                JOIN masterdata_pasien ON masterdata_pasien.id = transaksi_obat_keluar.id_pasien')->result_array();
        $data['obat'] = $this->db->get('masterdata_obat')->result_array();
        $data['pasien'] = $this->db->get('masterdata_pasien')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok/pengurangan/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function tambah()
    {
        
        $this->form_validation->set_rules('jumlah','Jumlah','required|trim');
        $this->form_validation->set_rules('tanggal_keluar','Jumlah','required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Data harus disi');
            redirect('stok/pengurangan');
        } else {
            $query = "SELECT max(`id`) as kodeTerbesar
                            FROM `transaksi_obat_keluar`";
            $data = $this->db->query($query)->result_array();
            foreach ($data as $d) {
                $dataStok = $d['kodeTerbesar'];
            }
            $urutan = (int) substr($dataStok, 0, 3);
            $urutan++;
            $huruf = "OBK";

            
            // $kodeObat = $huruf . sprintf("%03s", $urutan);
            // $namaObat = $this->input->post('nama_obat');
            // $stok = $this->input->post('stok');
            // $kategori = $this->input->post('kategori');
            // $deskripsi = $this->input->post('deskripsi');
            $id_obat = $this->input->post('id_obat');
            $jumlah = $this->input->post('jumlah');
            $queryHarga = $this->db->query("SELECT stok,harga FROM masterdata_obat WHERE id = '$id_obat'")->row_array();
            $stok = $queryHarga['stok'];
            if ($stok < $jumlah) {
                $this->session->set_flashdata('failed', 'Stok tidak ada');
                redirect('stok/pengurangan');
            } 
            $tambahStok = $stok - $jumlah;
             
            $arraydata = [
                'kode_transaksi' => $huruf . sprintf("%03s", $urutan),
                'id_obat' => $this->input->post('id_obat'),
                'id_pasien' => $this->input->post('id_pasien'),
                'harga' => $queryHarga['harga'],
                'harga_total' => $jumlah * $queryHarga['harga'],
                'jumlah' => $jumlah,
                'tanggal_keluar' => $this->input->post('tanggal_keluar')
            ];

            $this->db->set('stok', $tambahStok);
            $this->db->where('id', $id_obat);
            $this->db->update('masterdata_obat');

            $this->db->insert('transaksi_obat_keluar', $arraydata);
            $this->session->set_flashdata('massage', 'Data berhasil ditambahkan');
            redirect('stok/pengurangan');
        }
    }

    public function info($id) 
    {
        $data['title'] = 'Detail Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['info'] = $this->db->get_where('transaksi_obat_keluar', ['id' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok/pengurangan/info', $data);
        $this->load->view('templates/footer');

    }
}