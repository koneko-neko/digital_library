<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

    public function __construct(){
        parent::__construct();
        // Cek apakah user sudah login
        if($this->session->userdata('level') == NULL){
            redirect('auth');
        }
    }

    public function index() {
        $id_user = $this->session->userdata('id_user');

        // Membuat query dengan join antara tabel peminjaman, buku, dan kategori
        $this->db->select('peminjaman.*, buku.cover, buku.judul, kategori.nama_kategori');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku', 'left');
        $this->db->join('kategori', 'buku.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('peminjaman.id_user', $id_user);
        $this->db->order_by('buku.judul', 'ASC');
    
        // Mengambil hasil query
        $buku = $this->db->get()->result_array();
    
        // Menyiapkan data untuk dikirim ke view
        $data = array(
            'buku'  => $buku,
            'halaman'   => 'peminjaman'
        );

        // Menampilkan daftar buku yang telah dipinjam oleh pengguna
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/footer');
        $this->load->view('peminjaman_index', $data);
    }

    public function detail() {
        // Membuat query dengan join antara tabel peminjaman, buku, kategori, dan user
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
            'halaman'   => 'peminjaman'
        );
    
        // Menampilkan daftar peminjaman
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/footer');
        $this->load->view('detail_pinjaman', $data);
    }
    

    public function add($id_buku) {
        // Cek apakah peminjam sudah meminjam buku dengan judul yang sama
        $id_user = $this->session->userdata('id_user');
        $this->db->from('peminjaman');
        $this->db->where('id_user', $id_user);
        $this->db->where('id_buku', $id_buku);
        $cek = $this->db->get()->row();

        // if ($cek) {
        //     $this->session->set_flashdata('alert', '<div class="alert alert-primary" role="alert">
        //     Buku Sudah Dipinjam
        //     </div>');
        //     redirect('peminjaman');
        //     return;
        // }

        $this->db->from('buku');
        $this->db->where('id_buku', $id_buku);
        $buku = $this->db->get()->row();

        if ($buku && $buku->stok > 0) {

            // Mengurangi stok buku
            $this->db->set('stok', 'stok-1', FALSE);
            $this->db->where('id_buku', $id_buku);
            $this->db->update('buku');

            // Cek apakah stok buku sudah habis
            $this->db->from('buku');
            $this->db->where('id_buku', $id_buku);
            $updated_buku = $this->db->get()->row();

            if ($updated_buku->stok == 0) {
                // Update status buku menjadi 'kosong'
                $this->db->set('status', 'kosong');
                $this->db->where('id_buku', $id_buku);
                $this->db->update('buku');
            }

            // Menambahkan peminjaman baru
            $data = array(
                'id_user' => $id_user,
                'id_buku' => $id_buku,
                'tgl_peminjaman' => date('Y-m-d'),
                'lama_pinjam' => $this->input->post('lama_pinjam'),
                'status'    => 'Proses'
            );
            $this->db->insert('peminjaman', $data);

            $this->session->set_flashdata('notif', 'Menuggu Persetujuan Dari Petugas.');
        } else {
            $this->session->set_flashdata('notif', 'Stok buku tidak tersedia.');
        }

        redirect('peminjaman');
    }

    public function pengembalian($id_peminjaman) {
        // Mengambil data peminjaman berdasarkan id_peminjaman
        $this->db->from('peminjaman');
        $this->db->where('id_peminjaman', $id_peminjaman);
        $peminjaman = $this->db->get()->row();
    
        if ($peminjaman) {
            // Menambah stok buku
            $this->db->set('stok', 'stok+1', FALSE);
            $this->db->where('id_buku', $peminjaman->id_buku);
            $this->db->update('buku');
    
            $data = array(
                'tgl_pengembalian' => date('Y-m-d'),
                'status'           => 'Dikembalikan'
            );
            $this->db->where('id_peminjaman', $id_peminjaman); // Update hanya peminjaman ini
            $this->db->update('peminjaman', $data);
    
            $this->session->set_flashdata('notif', 'Buku berhasil dikembalikan.');
        } else {
            $this->session->set_flashdata('notif', 'Gagal mengembalikan buku.');
        }
    
        redirect('peminjaman/detail');
    }

    public function setuju($id_peminjaman) {
        // Mengambil data peminjaman berdasarkan id_peminjaman
        $this->db->from('peminjaman');
        $this->db->where('id_peminjaman', $id_peminjaman);
        $peminjaman = $this->db->get()->row();
    
        if ($peminjaman) {
            $data = array(
                'status'           => 'Dipinjam'
            );
            $this->db->where('id_peminjaman', $id_peminjaman); // Update hanya peminjaman ini
            $this->db->update('peminjaman', $data);
    
            $this->session->set_flashdata('notif', 'Buku Dipinjamkan Kepada Peminjam.');
        } else {
            $this->session->set_flashdata('notif', 'Gagal Meminjamkan buku.');
        }
    
        redirect('peminjaman/detail');
    }

    public function tolak($id_peminjaman) {
        // Mengambil data peminjaman berdasarkan id_peminjaman
        $this->db->from('peminjaman');
        $this->db->where('id_peminjaman', $id_peminjaman);
        $peminjaman = $this->db->get()->row();
    
        if ($peminjaman) {
            // Mengurangi stok buku
            $this->db->set('stok', 'stok-1', FALSE);
            $this->db->where('id_buku', $id_buku);
            $this->db->update('buku');

            $data = array(
                'status'           => 'Ditolak'
            );
            $this->db->where('id_peminjaman', $id_peminjaman); // Update hanya peminjaman ini
            $this->db->update('peminjaman', $data);
    
            $this->session->set_flashdata('notif', 'Peminjaman Ditolak');
        } else {
            $this->session->set_flashdata('notif', 'Gagal Terjadi Kesalahan');
        }
    
        redirect('peminjaman/detail');
    }
    
    
}
// public function pengembalian($id_buku) {
//     // Mengambil data peminjaman berdasarkan id_buku dan id_user
//     $this->db->from('peminjaman');
//     $this->db->where('id_buku', $id_buku);
//     $peminjaman = $this->db->get()->row();
    
//     if ($peminjaman) {
//         $tgl_peminjaman = new DateTime($peminjaman->tgl_peminjaman);
//         $tgl_pengembalian = new DateTime();
//         $lama_pinjam = $peminjaman->lama_pinjam;
        
//         // Menghitung tanggal jatuh tempo pengembalian
//         $jatuh_tempo = clone $tgl_peminjaman;
//         $jatuh_tempo->modify("+$lama_pinjam days");

//         // Cek apakah ada keterlambatan
//         $selisih = $tgl_pengembalian->diff($jatuh_tempo)->days;
//         $is_late = $tgl_pengembalian > $jatuh_tempo;

//         $denda = 0;
//         if ($is_late) {
//             // Tentukan denda berdasarkan jumlah hari keterlambatan
//             $denda_per_hari = 1000; // Anda bisa sesuaikan jumlah ini
//             $denda = $selisih * $denda_per_hari;
//         }

//         // Menambah stok buku
//         $this->db->set('stok', 'stok+1', FALSE);
//         $this->db->where('id_buku', $id_buku);
//         $this->db->update('buku');

//         $data = array(
//             'tgl_pengembalian' => $tgl_pengembalian->format('Y-m-d'),
//             'status'           => 'Dikembalikan',
//             'denda'            => $denda
//         );
//         $this->db->where('id_peminjaman', $peminjaman->id_peminjaman);
//         $this->db->update('peminjaman', $data);

//         $this->session->set_flashdata('notif', 'Buku berhasil dikembalikan. Denda: Rp' . $denda);
//     } else {
//         $this->session->set_flashdata('notif', 'Gagal mengembalikan buku.');
//     }

//     redirect('peminjaman/detail');
// }
