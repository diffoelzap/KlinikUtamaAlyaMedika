<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rawatinap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Rawat Inap';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pasien'] = $this->db->query('SELECT * FROM masterdata_pasien WHERE active != 0')->result_array();
        $data['kamar'] = $this->db->query('SELECT * FROM masterdata_kamar WHERE jumlah != 0')->result_array();
        $data['dokter'] = $this->db->get('masterdata_dokter')->result_array();
        $data['rawat_inap'] = $this->db->query('SELECT * FROM transaksi_rawat_inap
                                                JOIN masterdata_pasien ON masterdata_pasien.id = transaksi_rawat_inap.id_pasien
                                                JOIN masterdata_kamar ON masterdata_kamar.id = transaksi_rawat_inap.id_kamar
                                                JOIN masterdata_dokter ON masterdata_dokter.id = transaksi_rawat_inap.id_dokter')->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/rawatinap/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() 
    {
        $data['title'] = 'Rawat Inap';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        
        // $kodeObat = $huruf . sprintf("%03s", $urutan);
        // $namaObat = $this->input->post('nama_obat');
        // $stok = $this->input->post('stok');
        // $kategori = $this->input->post('kategori');
        // $deskripsi = $this->input->post('deskripsi');
        $jumlahKamar = $this->db->get_where('masterdata_kamar',['id' => $this->input->post('id_kamar')])->row_array();
        $arraydata = [
            'kode_rawat_inap' =>  $this->input->post('kode_rawat_inap'),
            'id_pasien' => $this->input->post('id_pasien'),
            'id_kamar' => $this->input->post('id_kamar'),
            'id_dokter' => $this->input->post('id_dokter'),
            'tanggal_masuk' => date('Y-m-d'),
            'active' => 1,
        ];
        $jmlFix = $jumlahKamar['jumlah'] - 1;
        // var_dump($jmlFix); die;
        $this->db->set('jumlah',$jmlFix);
        $this->db->where('id',$this->input->post('id_kamar'));
        $this->db->update('masterdata_kamar');

        $this->db->set('active',0);
        $this->db->where('id',$this->input->post('id_pasien'));
        $this->db->update('masterdata_pasien');
        $this->db->insert('transaksi_rawat_inap', $arraydata);
        $this->session->set_flashdata('massage', 'Data berhasil ditambahkan');
        redirect('transaksi/rawatinap');
        
    }

    public function detail($kode_rawat_inap)
    {
        $data['title'] = 'Rawat Inap';
        $data['title_detail'] = 'Detail Inap '.$kode_rawat_inap;
        $data['tindakan'] = $this->db->get('masterdata_tindakan')->result_array();
        $data['obat'] = $this->db->query('SELECT * FROM masterdata_obat WHERE id != 0')->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['total_harga'] = $this->db->query("SELECT 
                                                        transaksi_rawat_tindakan.kode_rawat,
                                                        transaksi_rawat_tindakan.harga_tindakan,
                                                        masterdata_obat.harga,
                                                        sum(transaksi_rawat_tindakan.harga_tindakan + masterdata_obat.harga) as total,
                                                        masterdata_kamar.harga as harga_kamar 
                                                        FROM transaksi_rawat_inap 
                                                        LEFT JOIN transaksi_rawat_tindakan ON transaksi_rawat_tindakan.kode_rawat = transaksi_rawat_inap.kode_rawat_inap 
                                                        LEFT JOIN masterdata_obat ON masterdata_obat.id = transaksi_rawat_tindakan.id_obat
                                                        LEFT JOIN masterdata_kamar ON masterdata_kamar.id = transaksi_rawat_inap.id_kamar
                                                        WHERE transaksi_rawat_inap.kode_rawat_inap = '$kode_rawat_inap'")->row_array();
        $data['detail_inap'] = $this->db->query("SELECT transaksi_rawat_inap.kode_rawat_inap,
                                                        masterdata_pasien.nama_pasien,
                                                        masterdata_kamar.nama_kamar,
                                                        masterdata_kamar.tipe_kamar,
                                                        masterdata_dokter.nama_dokter,
                                                        transaksi_rawat_inap.tanggal_masuk,
                                                        transaksi_rawat_inap.active,
                                                        transaksi_rawat_inap.lama_menginap
                                                FROM transaksi_rawat_inap
                                                JOIN masterdata_pasien ON masterdata_pasien.id = transaksi_rawat_inap.id_pasien
                                                JOIN masterdata_kamar ON masterdata_kamar.id = transaksi_rawat_inap.id_kamar
                                                JOIN masterdata_dokter ON masterdata_dokter.id = transaksi_rawat_inap.id_dokter
                                                WHERE transaksi_rawat_inap.kode_rawat_inap = '$kode_rawat_inap'")->row_array();
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
                                                    WHERE transaksi_rawat_tindakan.kode_rawat = '$kode_rawat_inap'")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/rawatinap/detail', $data);
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
        redirect('transaksi/rawatinap/detail/'.$this->input->post('kode_rawat'));
    }

    public function rawat_selesai($kode_rawat_inap,$tanggal_masuk) 
    {
        $tanggal_sekarang = date('Y-m-d');
        $query = $this->db->query("SELECT DATEDIFF('$tanggal_sekarang','$tanggal_masuk') as selisih")->row_array();
        $selisih = $query['selisih'] + 1;

        $dataTOTAL= $this->db->query("SELECT 
                    transaksi_rawat_tindakan.kode_rawat,
                    transaksi_rawat_tindakan.harga_tindakan,
                    masterdata_obat.harga,
                    sum(transaksi_rawat_tindakan.harga_tindakan + masterdata_obat.harga) as total,
                    masterdata_kamar.harga as harga_kamar 
                    FROM transaksi_rawat_inap 
                    LEFT JOIN transaksi_rawat_tindakan ON transaksi_rawat_tindakan.kode_rawat = transaksi_rawat_inap.kode_rawat_inap 
                    LEFT JOIN masterdata_obat ON masterdata_obat.id = transaksi_rawat_tindakan.id_obat
                    LEFT JOIN masterdata_kamar ON masterdata_kamar.id = transaksi_rawat_inap.id_kamar
                    WHERE transaksi_rawat_inap.kode_rawat_inap = '$kode_rawat_inap'")->row_array();
        
        $total_keseluruhan = ($selisih * $dataTOTAL['harga_kamar']) + $dataTOTAL['total'];

        $this->db->set('active', 0);
        $this->db->set('tanggal_keluar', date('Y-m-d'));
        $this->db->set('lama_menginap', $selisih);
        $this->db->set('harga_total', $total_keseluruhan);
        $this->db->where('kode_rawat_inap', $kode_rawat_inap);
        $this->db->update('transaksi_rawat_inap');

        $checkKamar = $data['kamar'] = $this->db->query("SELECT masterdata_kamar.jumlah,masterdata_kamar.id FROM masterdata_kamar 
                                                    JOIN transaksi_rawat_inap ON masterdata_kamar.id = transaksi_rawat_inap.id_kamar
                                                    WHERE transaksi_rawat_inap.kode_rawat_inap = '$kode_rawat_inap'")->row_array();

        $tambahKamar = $checkKamar['jumlah'] + 1;
        $this->db->set('jumlah',$tambahKamar);
        $this->db->where('id', $checkKamar['id']);
        $this->db->update('masterdata_kamar');

        redirect('transaksi/rawatinap');

    }

    public function delete($id,$kode_rawat)
    {
        $this->db->where('id',$id);
        $this->db->delete('transaksi_rawat_tindakan');

        $this->session->set_flashdata('massage', 'Data berhasil dihapus');
            redirect('transaksi/rawatinap/detail/'.$kode_rawat);
    }
}