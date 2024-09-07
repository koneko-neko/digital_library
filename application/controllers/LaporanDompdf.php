<?php class LaporanDompdf extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index(){
        $this->db->select('peminjaman.*, buku.cover, buku.judul, kategori.nama_kategori, user.username, user.nama_lengkap, user.email, user.no_telp, user.alamat');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku', 'left');
        $this->db->join('kategori', 'buku.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('user', 'peminjaman.id_user = user.id_user', 'left');
        $this->db->order_by('peminjaman.tgl_peminjaman', 'ASC');
        
        $peminjaman = $this->db->get()->result_array();
        
        // Menyiapkan data untuk dikirim ke view
        $data = array(
            'peminjaman'  => $peminjaman,
        );


        $this->load->library('pdf');
	    $this->pdf->setPaper('A4', 'landscape');
	    $this->pdf->filename = "Laporan-Dompdf-Codeigniter.pdf";
	    $this->pdf->load_view('v_pdf', $data);
    } 
}