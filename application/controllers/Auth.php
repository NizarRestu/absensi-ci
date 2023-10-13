<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
		$this->load->helper('my_helper');
    }


	public function index()
	{
		$this->load->view('auth/login');
	}
    public function register_karyawan()
	{
		$this->load->view('auth/register_karyawan');
	}
    public function register_admin()
	{
		$this->load->view('auth/register_admin');
	}
    public function aksi_register_karyawan()
    {
        $email = $this->input->post('email', true);
        $data = ['email' => $email];
        $password = $this->input->post('password');
        $username = $this->input->post('username');
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $query = $this->m_model->getwhere('user', $data);
        $result = $query->row_array();
        if (empty($result)) {
            if (strlen($password) < 8) {
                $this->session->set_flashdata('error_password' , 'gagal...');
                redirect(base_url('auth/register_karyawan'));
            } else {
                $data = [
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'nama_depan' => $this->input->post('nama_depan'),
                    'nama_belakang' => $this->input->post('nama_belakang'),
                    'role' => 'karyawan',
                    'image' => 'User.png',
                    'password' => md5($this->input->post('password')),
                ];
                $this->session->set_flashdata('succsess' , 'berhasil...');
                $this->m_model->add('user', $data);
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('error_email' , 'gagal...');
            redirect(base_url('auth/register_karyawan'));
        }
        

    }
    public function aksi_register_admin()
    {
        $email = $this->input->post('email', true);
        $data = ['email' => $email];
        $password = $this->input->post('password');
        $username = $this->input->post('username');
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $query = $this->m_model->getwhere('user', $data);
        $result = $query->row_array();
        if (empty($result)) {
            if (strlen($password) < 8) {
                $this->session->set_flashdata('error_password' , 'gagal...');
                redirect(base_url('auth/register_admin'));
            } else {
                $data = [
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'nama_depan' => $this->input->post('nama_depan'),
                    'nama_belakang' => $this->input->post('nama_belakang'),
                    'role' => 'admin',
                    'image' => 'User.png',
                    'password' => md5($this->input->post('password')),
                ];
                $this->session->set_flashdata('succsess' , 'berhasil...');
                $this->m_model->add('user', $data);
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('error_email' , 'gagal...');
            redirect(base_url('auth/register_admin'));
        }
    
    }
    public function aksi_login()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $data = ['email' => $email];
        $query = $this->m_model->getwhere('user', $data);
        $result = $query->row_array();
        if (!empty($result) && md5($password) === $result['password']) {
            $data = [
                'logged_in' => true,
                'email' => $result['email'],
                'username' => $result['username'],
                'role' => $result['role'],
                'id' => $result['id'],

            ];
            $this->session->set_userdata($data);
            if ($result['role'] == 'karyawan') {
                redirect(base_url() . "karyawan/dashboard");
            } elseif ($result['role'] == 'admin') {
                redirect(base_url(). 'admin/dashboard');
            }
        } else {
            $this->session->set_flashdata('error' , 'error ');
            redirect(base_url());
        }
    }
	public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}