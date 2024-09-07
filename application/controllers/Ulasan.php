<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulasan extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        if($this->session->userdata('level') == NULL){
            redirect('auth');
        }
    }

    public function index(){
        $this->db->select('ulasan.*, user.nama_lengkap, user.username, buku.judul, buku.cover');
        $this->db->from('ulasan');
        $this->db->join('user', 'ulasan.id_user = user.id_user', 'left');
        $this->db->join('buku', 'ulasan.id_buku = buku.id_buku', 'left');
        $ulasan = $this->db->get()->result_array();
        
        $data = array(
            'ulasan' => $ulasan,
            'halaman'   => 'ulasan'
        );
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/footer');
        $this->load->view('ulasan_index', $data);
	}

    public function tambah_ulasan($id_buku) {
        $ulasan = $this->input->post('ulasan'); // Teks ulasan
        $rating = $this->input->post('rating'); // Rating yang diberikan
        
        $data = array(
            'id_user' => $this->session->userdata('id_user'),
            'id_buku' => $id_buku,
            'ulasan'  => $ulasan,
            'rating'  => $rating
        );

        $this->db->insert('ulasan', $data);
        redirect('buku/detail/' .$id_buku);
    }
}
