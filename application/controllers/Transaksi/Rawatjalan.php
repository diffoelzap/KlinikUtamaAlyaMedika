<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rawatjalan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Rawat Jalan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pasien'] = $this->db->query('SELECT * FROM masterdata_pasien WHERE active != 0')->result_array();
        $data['dokter'] = $this->db->get('masterdata_dokter')->result_array();
        $data['rawat_jalan'] = $this->db->query('SELECT 
        transaksi_rawat_jalan.kode_rawat_jalan,
        masterdata_pasien.nama_pasien,
        transaksi_rawat_jalan.tanggal_rawat,
        transaksi_rawat_jalan.active
        FROM transaksi_rawat_jalan
        JOIN masterdata_pasien ON masterdata_pasien.id = transaksi_rawat_jalan.id_pasien
        JOIN masterdata_dokter ON masterdata_dokter.id = transaksi_rawat_jalan.id_dokter')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/rawatjalan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Rawat Jalan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $arraydata = [
            'kode_rawat_jalan' =>  $this->input->post('kode_rawat_jalan'),
            'id_pasien' => $this->input->post('id_pasien'),
            'id_dokter' => $this->input->post('id_dokter'),
            'tanggal_rawat' => date('Y-m-d'),
            'active' => 1,
        ];

        $this->db->set('active',0);
        $this->db->where('id',$this->input->post('id_pasien'));
        $this->db->update('masterdata_pasien');
        $this->db->insert('transaksi_rawat_jalan', $arraydata);
        $this->session->set_flashdata('massage', 'Data berhasil ditambahkan');
        redirect('transaksi/rawatjalan');
    }

    public function detail($kode_rawat_jalan)
    {
        $data['title'] = 'Rawat Jalan';
        $data['title_detail'] = 'Detail Jalan '.$kode_rawat_jalan;
        $data['tindakan'] = $this->db->get('masterdata_tindakan')->result_array();
        $data['obat'] = $this->db->query('SELECT * FROM masterdata_obat WHERE id != 0')->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['total_harga'] = $this->db->query("SELECT 
                                                        transaksi_rawat_tindakan.kode_rawat,
                                                        transaksi_rawat_tindakan.harga_tindakan,
                                                        masterdata_obat.harga,
                                                        sum(transaksi_rawat_tindakan.harga_tindakan + masterdata_obat.harga) as total
                                                        FROM transaksi_rawat_jalan
                                                        LEFT JOIN transaksi_rawat_tindakan ON transaksi_rawat_tindakan.kode_rawat = transaksi_rawat_jalan.kode_rawat_jalan
                                                        LEFT JOIN masterdata_obat ON masterdata_obat.id = transaksi_rawat_tindakan.id_obat
                                                        WHERE transaksi_rawat_jalan.kode_rawat_jalan = '$kode_rawat_jalan'")->row_array();
        $data['detail_jalan'] = $this->db->query("SELECT transaksi_rawat_jalan.kode_rawat_jalan,
                                                        masterdata_pasien.nama_pasien,
                                                        masterdata_dokter.nama_dokter,
                                                        transaksi_rawat_jalan.tanggal_rawat,
                                                        transaksi_rawat_jalan.active
                                                FROM transaksi_rawat_jalan
                                                JOIN masterdata_pasien ON masterdata_pasien.id = transaksi_rawat_jalan.id_pasien
                                                JOIN masterdata_dokter ON masterdata_dokter.id = transaksi_rawat_jalan.id_dokter
                                                WHERE transaksi_rawat_jalan.kode_rawat_jalan = '$kode_rawat_jalan'")->row_array();
        $data['detail_tindakan'] = $this->db->query("SELECT 
                                                    transaksi_rawat_tindakan.id,
                                                    masterdata_tindakan.nama_tindakan,
                                                    masterdata_obat.nama_obat,
                                                    masterdata_obat.harga,
                                                    transaksi_rawat_tindakan.kode_rawat,
                                                    transaksi_rawat_tindakan.harga_tindakan
                                                    FROM transaksi_rawat_tindakan
                                                    JOIN masterdata_tindakan ON masterdata_tindakan.id = transaksi_rawat_tindakan.id_tindakan
                                                    JOIN masterdata_obat ON masterdata_obat.id = transaksi_rawat_tindakan.id_obat
                                                    WHERE transaksi_rawat_tindakan.kode_rawat = '$kode_rawat_jalan'")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/rawatjalan/detail', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_tindakan()
    {
        $arraydata = [
            'kode_rawat' => $this->input->post('kode_rawat'),
            'id_tindakan' => $this->input->post('id_tindakan'),
            'id_obat' => $this->input->post('id_obat'),
            'harga_tindakan' => $this->input->post('harga_tindakan'),
            'tanggal_tindakan' => date('Y-m-d')
        ];

        $this->db->insert('transaksi_rawat_tindakan', $arraydata);
        $this->session->set_flashdata('massage', 'Data berhasil ditambahkan');
        redirect('transaksi/rawatjalan/detail/'.$this->input->post('kode_rawat'));
    }

    public function rawat_selesai($kode_rawat_jalan) 
    {
        $tanggal_sekarang = date('Y-m-d');

        $dataTOTAL= $this->db->query("SELECT 
                    transaksi_rawat_tindakan.kode_rawat,
                    transaksi_rawat_tindakan.harga_tindakan,
                    masterdata_obat.harga,
                    sum(transaksi_rawat_tindakan.harga_tindakan + masterdata_obat.harga) as total
                    FROM transaksi_rawat_jalan
                    LEFT JOIN transaksi_rawat_tindakan ON transaksi_rawat_tindakan.kode_rawat = transaksi_rawat_jalan.kode_rawat_jalan 
                    LEFT JOIN masterdata_obat ON masterdata_obat.id = transaksi_rawat_tindakan.id_obat
                    WHERE transaksi_rawat_jalan.kode_rawat_jalan = '$kode_rawat_jalan'")->row_array();
        

        $this->db->set('active', 0);
        $this->db->set('harga_total', $dataTOTAL['total']);
        $this->db->where('kode_rawat_jalan', $kode_rawat_jalan);
        $this->db->update('transaksi_rawat_jalan');

        redirect('transaksi/rawatjalan');

    }

    public function delete($id,$kode_rawat)
    {
        $this->db->where('id',$id);
        $this->db->delete('transaksi_rawat_tindakan');

        $this->session->set_flashdata('massage', 'Data berhasil dihapus');
            redirect('transaksi/rawatjalan/detail/'.$kode_rawat);
    }
}