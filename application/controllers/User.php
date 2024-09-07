<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
        public function __construct(){
        parent:: __construct();
        if ($this->session->userdata('level') != 'admin'){
        redirect('auth');
        }
        }

	public function index(){
        $this->db->from('user');
        $this->db->order_by('nama_lengkap', 'ASC');
        $user = $this->db->get()->result_array();
        $data = array(
            'user'   => $user,
            'halaman'   => 'user'
        );

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/footer');
        $this->load->view('pengguna', $data);
	}

        public function hapus($id){
        $where = array(
                'id_user' => $id 
        );
        $this->db->delete('user', $where);
        $this->session->set_flashdata('notif', 'berhasil dihapus');
        redirect('user');
        }

        public function tambah_user(){
        $username       = $this->input->post('username');
        $nama_lengkap   = $this->input->post('nama_lengkap');
        $alamat         = $this->input->post('alamat');
        $email          = $this->input->post('email');
        $no_telp        = $this->input->post('no_telp');
        $password       = md5($this->input->post('password')); // Encrypt password using md5
        $level          = $this->input->post('level'); // Encrypt password using md5

        // Check if username already exists
        $this->db->from('user')->where('username', $username);
        $existing_user = $this->db->get()->row();

        if ($existing_user) {
                $this->session->set_flashdata('notif', 'Username Sudah Ada');
                redirect('user');
        } else {
                // Prepare data for insertion
                $data = array(
                'username'      => $username,
                'nama_lengkap'  => $nama_lengkap,
                'alamat'        => $alamat,
                'email'         => $email,
                'no_telp'       => $no_telp,
                'password'      => $password,
                'level'         => $level // Set default role to peminjam
                );

                $this->db->insert('user', $data);
                redirect('user');
        }
        }

        public function update($id_user){
        $nama_lengkap   = $this->input->post('nama_lengkap');
        $alamat         = $this->input->post('alamat');
        $email          = $this->input->post('email');
        $no_telp        = $this->input->post('no_telp');
        $level          = $this->input->post('level'); // Encrypt password using md5

        // Check if username already exists
        $this->db->from('user')->where('username', $username);
        $existing_user = $this->db->get()->row();

        if ($existing_user) {
                $this->session->set_flashdata('notif', 'Username Sudah ada');
                redirect('user');
        } else {
                // Prepare data for insertion
                $data = array(
                'nama_lengkap'  => $nama_lengkap,
                'alamat'        => $alamat,
                'email'         => $email,
                'no_telp'       => $no_telp,
                'level'         => $level // Set default role to peminjam
                );

                $this->db->where('id_user', $id_user);
                $this->db->update('user', $data);
                $this->session->set_flashdata('notif', 'User Berhasil diupdate');
                redirect('user');
        }
        }


}
