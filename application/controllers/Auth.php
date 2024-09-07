<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
        $this->load->view('login');
	}

	public function login() {
		$username = $this->input->post('username');   
		$password = md5($this->input->post('password'));
		
		$this->db->from('user')->where('username', $username);   
		$cek = $this->db->get()->row();
	
		if ($cek == NULL) {
			$this->session->set_flashdata('notif', 'Username salah');        
			redirect('auth');
		} else if ($cek->password == $password) {
			$data = array(
				'id_user'      => $cek->id_user,
				'username'     => $cek->username,
				'nama_lengkap' => $cek->nama_lengkap,
				'level'        => $cek->level,
				'email'        => $cek->email,
				'no_telp'      => $cek->no_telp,
				'alamat'       => $cek->alamat
			);
			
			$this->session->set_userdata($data);
	
			// Redirect based on user level
			if ($cek->level == 'peminjam') {
				$this->session->set_flashdata('notif', 'Berhasil Login Sebagai');
				redirect('buku');
			} else if ($cek->level == 'admin' || $cek->level == 'petugas') {
				$this->session->set_flashdata('notif', 'Berhasil Login');
				redirect('home');
			} else {
				$this->session->set_flashdata('notif', 'Anda tidak memiliki akses login');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('notif', 'Password salah');
			redirect('auth');
		}
	}
	

	public function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }
}
