<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        if ($this->session->userdata('level') == 'peminjam'){
            redirect('auth');
        } else if($this->session->userdata('level') == NULL){
            redirect('auth');
        }
    }

    public function index(){
        $this->db->from('buku');
        $buku = $this->db->count_all_results();
 
        $this->db->from('kategori');
        $kategori = $this->db->count_all_results();

        $this->db->from('peminjaman');
        $peminjaman = $this->db->count_all_results();

        $this->db->from('ulasan');
        $ulasan = $this->db->count_all_results();

        $data = array(
        'buku'   => $buku,
        'kategori'   => $kategori,
        'peminjaman'   => $peminjaman,
        'ulasan'   => $ulasan,
        'halaman'   => 'home'
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/footer');
        $this->load->view('beranda', $data);
	}
}
