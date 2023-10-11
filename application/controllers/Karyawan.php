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
        $data['history'] = $this-> m_model->get_history('absensi' , $this->session->userdata('id'))->result();
		$this->load->view('pages/karyawan/history' , $data);
	}
    public function absen()
	{
		$this->load->view('pages/karyawan/absen');
	}
    public function izin()
	{
		$this->load->view('pages/karyawan/izin');
	}
    public function dashboard()
	{
        $data['absen'] = $this-> m_model->get_history('absensi' , $this->session->userdata('id'))->result();
		$this->load->view('pages/karyawan/dashboard',$data);
	}
    public function aksi_absen()
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu_sekarang = date('Y-m-d H:i:s');
        $data = [
            'kegiatan' => $this->input->post('kegiatan'),
            'id_karyawan' => $this->session->userdata('id'),
            'jam_pulang' => NULL,
            'jam_masuk' => $waktu_sekarang, // Mengatur "jam_masuk" ke waktu saat ini
            'date' => date('Y-m-d'), // Mengatur "date" ke tanggal saat ini
            'keterangan_izin' => '-',
            'status' => 'not'
        ];
    
        $this->m_model->add('absensi', $data);
        redirect(base_url('karyawan/absen'));
    }
    public function  hapus($id) {
        $this -> m_model->delete('absensi' , 'id' , $id);
        redirect(base_url('karyawan/history'));
    }
    public function pulang($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu_sekarang = date('Y-m-d H:i:s');
        $data = [
            'jam_pulang' => $waktu_sekarang,
            'status' => 'done'
        ];
        $this->m_model->update('absensi', $data, array('id'=> $id));
        redirect(base_url('karyawan/history'));
    }
    public function ubah_absen($id)
	{
        $data['absen'] = $this-> m_model->get_by_id('absensi' , 'id', $id)->result();
		$this->load->view('pages/karyawan/update_absen',$data);
	}
    public function aksi_update_absen()
    {
        $data =  [
            'kegiatan' => $this->input->post('kegiatan'),
        ];
        $eksekusi = $this->m_model->update('absensi', $data, array('id'=>$this->input->post('id')));
        if($eksekusi) {
            $this->session->set_flashdata('sukses' , 'berhasil');
            redirect(base_url('karyawan/history'));
        } else {
            $this->session->set_flashdata('error' , 'gagal...');
            redirect(base_url('karyawan/ubah_absen/'.$this->input->post('id')));
        }
    }
}