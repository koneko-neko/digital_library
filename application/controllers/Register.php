<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index(){
        $this->load->view('regist');
	}
	
	public function daftar(){
        $username   = $this->input->post('username');
        $nama_lengkap       = $this->input->post('nama_lengkap');
        $alamat     = $this->input->post('alamat');
        $email      = $this->input->post('email');
        $no_telp      = $this->input->post('no_telp');
        $password   = md5($this->input->post('password')); // Encrypt password using md5

        // Check if username already exists
        $this->db->from('user')->where('username', $username);
        $cek = $this->db->get()->row();

        if ($cek) {
            $this->session->set_flashdata('notif', 'Username Sudah Ada');
            redirect('auth');
        } else {
            // Prepare data for insertion
            $data = array(
                'username' => $username,
                'nama_lengkap'     => $nama_lengkap,
                'alamat'   => $alamat,
                'email'    => $email,
                'no_telp'    => $no_telp,
                'password' => $password,
                'level'     => 'peminjam' // Set default role to peminjam
            );

            $this->db->insert('user', $data);
            $this->session->set_flashdata('notif', 'Berhasil Registrasi');
            // $this->session->set_userdata($data);
            redirect('auth');
        }
    }
}
