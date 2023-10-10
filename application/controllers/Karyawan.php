<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'karyawan') {
            redirect(base_url());
        }
    }
    public function history()
	{
		$this->load->view('pages/karyawan/history');
	}
    public function absen()
	{
		$this->load->view('pages/karyawan/absen');
	}

}