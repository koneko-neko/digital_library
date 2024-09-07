<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_tambah extends CI_Controller {
    public function __construct(){  
        parent:: __construct();
        if ($this->session->userdata('level') == 'peminjam'){
            redirect('auth');
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
            'halaman'   => $buku,
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/footer');
        $this->load->view('buku_tambah', $data);
	}

    public function add(){
        $config['upload_path'] = './assets/upload/buku/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;
        $config['file_name'] = date('YmdHis');
        
        $this->upload->initialize($config);
    
        if ($this->upload->do_upload('cover')) {
            $file_data = $this->upload->data();
            $cover = $file_data['file_name'];
    
            $data = array(
                'judul' => $this->input->post('judul'),
                'penulis' => $this->input->post('penulis'),
                'penerbit' => $this->input->post('penerbit'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'cover' => $cover,
                'sipnosis' => $this->input->post('sipnosis'),
                'stok' => $this->input->post('stok'),
                'id_kategori' => $this->input->post('id_kategori'),
                'status' => 'tersedia'
            );
    
            $this->db->insert('buku', $data);
            $this->session->set_flashdata('notif', 'Buku berhasil ditambahkan.');
            redirect('buku');
        } else {
            $this->session->set_flashdata('notif', 'Gagal menambahkan Buku');
            redirect('buku');
        }
    }
    
    public function hapus_buku($id_buku) {
        // Mendapatkan data buku berdasarkan id
        $buku = $this->db->get_where('buku', array('id_buku' => $id_buku))->row();
        
        if ($buku) {
            // Hapus file cover dari direktori
            if (file_exists('./assets/upload/buku/' . $buku->cover)) {
                unlink('./assets/upload/buku/' . $buku->cover);
            }

            // Hapus data buku dari database
            $this->db->delete('buku', array('id_buku' => $id_buku));
            $this->session->set_flashdata('notif', 'Buku berhasil dihapus.');
        } else {
            $this->session->set_flashdata('notif', 'Buku tidak ditemukan.');
        }

        redirect('buku'); // Ganti dengan halaman yang sesuai setelah penghapusan
    }

    public function update($id_buku) {
        $config['upload_path'] = './assets/upload/buku/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // ukuran maksimum file 2MB

        $config['file_name'] = date('YmdHis');
        
        $this->upload->initialize($config);
    
        // Memeriksa apakah ada file cover yang diupload
        if ($this->upload->do_upload('cover')) {
            $file_data = $this->upload->data();
            $cover = $file_data['file_name'];
    
            // Menghapus cover lama jika ada file baru yang diupload
            $old_cover = $this->db->select('cover')->from('buku')->where('id_buku', $id_buku)->get()->row()->cover;
            if ($old_cover && file_exists('./assets/upload/buku/' . $old_cover)) {
                unlink('./assets/upload/buku/' . $old_cover);
            }
        } else {
            // Jika tidak ada file baru, gunakan cover lama
            $cover = $this->input->post('cover_lama');
        }
    
        $data = array(
            'judul' => $this->input->post('judul'),
            'penulis' => $this->input->post('penulis'),
            'penerbit' => $this->input->post('penerbit'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
            'cover' => $cover,
            'sipnosis' => $this->input->post('sipnosis'),
            'stok' => $this->input->post('stok'),
            'id_kategori' => $this->input->post('id_kategori'),
            // 'status' => $this->input->post('status') // Update status jika ada
        );

        $stok = $this->input->post('stok');

        // Update status berdasarkan stok
        if ($stok >= 1) {
            $data['status'] = 'tersedia';
        } elseif($stok <= 0) {
            $data['status'] = 'kosong';
        }

        $this->db->where('id_buku', $id_buku);
        $this->db->update('buku', $data);
    
        $this->session->set_flashdata('notif', 'Buku berhasil diupdate.');
        redirect('buku');
    }
    
}
