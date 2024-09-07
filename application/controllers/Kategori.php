<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    public function __construct(){  
        parent:: __construct();
        if ($this->session->userdata('level') == 'peminjam'){
            redirect('buku');
        } else if($this->session->userdata('level') == NULL){
            redirect('auth');
        }
    }  

	public function index(){
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();
        $data = array(
            'kategori'   => $kategori,
            'halaman'   => 'kategori'
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/footer');
        $this->load->view('kategori', $data);
	}

    public function simpan(){
        $this->db->from('kategori');
        $this->db->where('nama_kategori', $this->input->post('nama_kategori'));
        $cek = $this->db->get()->result_array();
        if($cek<>NULL){
            $this->session->set_flashdata('notif', 'kategori sudah ada');
            redirect('kategori');
        }
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori')
        );
        $this->db->insert('kategori', $data);
        $this->session->set_flashdata('notif', 'katgori berhasil ditambahkan');
        redirect('kategori');
    }

    public function hapus($id){
        $where = array(
            'id_kategori' => $id 
        );
        $this->db->delete('kategori', $where);
        $this->session->set_flashdata('notif', 'berhasil dihapus');
        redirect('kategori');
    }

    public function update($id_kategori){
        // Ambil data dari POST
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori')
        );

        // Update data di database
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);

        // Set pesan flashdata dan redirect
        $this->session->set_flashdata('notif', 'Kategori berhasil diperbarui');
        redirect('kategori');
    }

}
