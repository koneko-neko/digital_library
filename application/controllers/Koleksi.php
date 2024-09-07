<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koleksi extends CI_Controller {
    public function __construct(){  
        parent:: __construct();
        if($this->session->userdata('level') == NULL){
            redirect('auth');
        }
    } 

    public function index() {
        $id_user = $this->session->userdata('id_user');

        $this->db->select('*');
        $this->db->from('koleksi');
        $this->db->join('buku', 'buku.id_buku = koleksi.id_buku', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = koleksi.id_kategori', 'left');
        $this->db->join('user', 'user.id_user = koleksi.id_user', 'left');
        $this->db->where('koleksi.id_user', $id_user);
        $this->db->order_by('buku.judul', 'ASC');
        $koleksi = $this->db->get()->result_array();

        $data = array(
            'koleksi' => $koleksi,
            'halaman'   => 'koleksi'
        );
    
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/footer');
        $this->load->view('koleksi', $data);
    }
        
    public function add($id_buku) {
        // Dapatkan id_user dari session
        $id_user = $this->session->userdata('id_user');
    
        // Cek apakah buku sudah ada di koleksi user
        $this->db->from('koleksi');
        $this->db->where('id_user', $id_user);
        $this->db->where('id_buku', $id_buku);
        $koleksi = $this->db->get()->row();
        if ($koleksi) {
            $this->session->set_flashdata('notif', 'Buku sudah ada di dalam koleksi Anda');
            redirect('buku');
        } else {
            $data = array(
                'id_user' => $id_user,
                'id_buku' => $id_buku
            );

            $this->db->insert('koleksi', $data);
            $this->session->set_flashdata('notif', 'Buku berhasil ditambahkan ke dalam koleksi Anda');
        redirect('koleksi');
        }
    }

    public function hapus($id_koleksi) {
        $this->db->where('id_koleksi', $id_koleksi);
        $this->db->delete('koleksi');
        $this->session->set_flashdata('notif', 'Buku berhasil dihapus dari daftar koleksi anda');
        redirect('koleksi');
    
    }
}
