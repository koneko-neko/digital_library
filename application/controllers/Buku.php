<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
        public function __construct(){  
        parent:: __construct();
        if($this->session->userdata('level') == NULL){
                redirect('auth');
        }
        } 
        
        public function index() {
        // Ambil data buku beserta kategori
        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'buku.id_kategori = kategori.id_kategori', 'left');
        $this->db->order_by('buku.judul', 'ASC');
        $buku = $this->db->get()->result_array();
        
        // Ambil data kategori
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get('kategori')->result_array();
        
        $data = array(
                'buku' => $buku,
                'kategori' => $kategori,
                'halaman'       => 'buku'
        );
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/footer');
        $this->load->view('buku', $data);
        }
            

        public function detail($id_buku){
        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'buku.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('buku.id_buku', $id_buku);
        $buku = $this->db->get()->row();
        
        $this->db->select('ulasan.*, user.nama_lengkap, user.username, buku.judul, buku.cover');
        $this->db->from('ulasan');
        $this->db->join('user', 'ulasan.id_user = user.id_user', 'left');
        $this->db->join('buku', 'ulasan.id_buku = buku.id_buku', 'left');
        $this->db->where('ulasan.id_buku', $id_buku); // Filter ulasan berdasarkan id_buku
        $ulasan = $this->db->get()->result_array();

        $data = array(
                'ulasan' => $ulasan,
                'buku'  => $buku,
                'halaman'  => $buku,
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/footer');
        $this->load->view('detail_buku', $data);   
        }
}
