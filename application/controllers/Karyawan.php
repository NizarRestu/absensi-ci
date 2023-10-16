<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->library('pagination');
        if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'karyawan') {
            redirect(base_url());
        }
    }
    public function history()
	{
        $config = array(
            'base_url' => site_url('karyawan/history'),
            'total_rows' => $this->m_model->count_history($this->session->userdata('id')),
            'per_page' => 10,
            'num_links' => 4,
            'use_page_numbers' => TRUE,
        );
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
        
        $data['history'] = $this->m_model->get_history_page($config['per_page'], ($page - 1) * $config['per_page'], $this->session->userdata('id'));
        $data['links'] = $this->pagination->create_links();
        
        $this->load->view('pages/karyawan/history', $data);
	}
    public function absen()
	{
		$this->load->view('pages/karyawan/absen');
	}
    public function izin()
	{
		$this->load->view('pages/karyawan/izin');
	}
    public function profile()
	{
        $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
		$this->load->view('pages/karyawan/profile',$data);
	}
    public function dashboard()
	{
        $config = array(
            'base_url' => site_url('karyawan/dashboard'),
            'total_rows' => $this->m_model->count_history($this->session->userdata('id')),
            'per_page' => 5,
            'num_links' => 4,
            'use_page_numbers' => TRUE,
        );
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
        
        $data['history'] = $this->m_model->get_history_page($config['per_page'], ($page - 1) * $config['per_page'], $this->session->userdata('id'));
        $data['links'] = $this->pagination->create_links();
        $data['jumlah_absen'] = $this-> m_model->get_absen('absensi' , $this->session->userdata('id'))->num_rows();
        $data['jumlah_izin'] = $this-> m_model->get_izin('absensi' , $this->session->userdata('id'))->num_rows();
		$this->load->view('pages/karyawan/dashboard',$data);
	}
    public function aksi_absen()
    {
        $tanggal = date('Y-m-d');
        $query_absen = $this->m_model->get_absen_by_tanggal($tanggal,$this->session->userdata('id'));
        $validasi_absen = $query_absen->num_rows();
        $query_izin = $this->m_model->get_izin_by_tanggal($tanggal,$this->session->userdata('id'));
        $validasi_izin = $query_izin->num_rows();
        if($validasi_absen > 0){
            $this->session->set_flashdata('error' , 'error ');
            redirect(base_url('karyawan/absen'));
        }else if($validasi_izin > 0){
            date_default_timezone_set('Asia/Jakarta');
            $waktu_sekarang = date('Y-m-d H:i:s');
            $data = [
                'kegiatan' => $this->input->post('kegiatan'),
                'id_karyawan' => $this->session->userdata('id'),
                'jam_pulang' => NULL,
                'jam_masuk' => $waktu_sekarang, // Mengatur "jam_masuk" ke waktu saat ini
                'date' => $tanggal, // Mengatur "date" ke tanggal saat ini
                'keterangan_izin' => '-',
                'status' => 'not'
            ];
            $query = $this->m_model->get_izin_by_tanggal($tanggal,$this->session->userdata('id'));
            $id = $query->row_array();
            $this->m_model->update('absensi', $data, array('id'=>$id['id']));
            redirect(base_url('karyawan/history'));
        }else {
            date_default_timezone_set('Asia/Jakarta');
            $waktu_sekarang = date('Y-m-d H:i:s');
            $data = [
                'kegiatan' => $this->input->post('kegiatan'),
                'id_karyawan' => $this->session->userdata('id'),
                'jam_pulang' => NULL,
                'jam_masuk' => $waktu_sekarang, // Mengatur "jam_masuk" ke waktu saat ini
                'date' => $tanggal, // Mengatur "date" ke tanggal saat ini
                'keterangan_izin' => '-',
                'status' => 'not'
            ];
            
            $this->m_model->add('absensi', $data);
            redirect(base_url('karyawan/history'));
        }
    }
    public function aksi_izin()
    {
        $tanggal = date('Y-m-d');
        $query_absen = $this->m_model->get_absen_by_tanggal($tanggal,$this->session->userdata('id'));
        $validasi_absen = $query_absen->num_rows();
        $query_izin = $this->m_model->get_izin_by_tanggal($tanggal,$this->session->userdata('id'));
        $validasi_izin = $query_izin->num_rows();
        if($validasi_izin > 0){
            $this->session->set_flashdata('error' , 'error ');
            redirect(base_url('karyawan/izin'));
        }else if($validasi_absen > 0){
            date_default_timezone_set('Asia/Jakarta');
            $waktu_sekarang = date('Y-m-d H:i:s');
            $data = [
                'kegiatan' => '-',
                'id_karyawan' => $this->session->userdata('id'),
                'jam_pulang' => NULL,
                'jam_masuk' => NULL, 
                'date' => date('Y-m-d'),
                'keterangan_izin' => $this->input->post('izin'),
                'status' => 'done'
            ];
            $query = $this->m_model->get_absen_by_tanggal($tanggal,$this->session->userdata('id'));
            $id = $query->row_array();
            $this->m_model->update('absensi', $data, array('id'=>$id['id']));
            redirect(base_url('karyawan/history'));
        }else {
            $data = [
                'kegiatan' => '-',
                'id_karyawan' => $this->session->userdata('id'),
                'jam_pulang' => NULL,
                'jam_masuk' => NULL, 
                'date' => date('Y-m-d'),
                'keterangan_izin' => $this->input->post('izin'),
                'status' => 'done'
            ];
        
            $this->m_model->add('absensi', $data);
            redirect(base_url('karyawan/history'));
        }
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
    public function ubah_izin($id)
	{
        $data['izin'] = $this-> m_model->get_by_id('absensi' , 'id', $id)->result();
		$this->load->view('pages/karyawan/update_izin',$data);
	}
    public function aksi_update_izin()
    {
        $data =  [
            'keterangan_izin' => $this->input->post('izin'),
        ];
        $eksekusi = $this->m_model->update('absensi', $data, array('id'=>$this->input->post('id')));
        if($eksekusi) {
            $this->session->set_flashdata('sukses' , 'berhasil');
            redirect(base_url('karyawan/history'));
        } else {
            $this->session->set_flashdata('error' , 'gagal...');
            redirect(base_url('karyawan/ubah_izin/'.$this->input->post('id')));
        }
    }
    public function aksi_ubah_profile()
    {
        $foto = $_FILES['image']['name'];
		$foto_temp = $_FILES['image']['tmp_name'];
        $password_baru = $this->input->post('password');
        $konfirmasi_password = $this->input->post('con_pass');
        $username = $this->input->post('username');
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        if ($foto) {
			$kode = round(microtime(true) * 1000);
			$file_name = $kode . '_' . $foto;
			$upload_path = './images/' . $file_name;
			if (move_uploaded_file($foto_temp, $upload_path)) {
				// Hapus foto lama jika ada
				$old_file = $this->m_model->get_foto_by_id($this->session->userdata('id'));
				if ($old_file && file_exists('./images/' . $old_file && $old_file !== 'User.png')) {
					unlink('./images/' . $old_file);
				}
				$data = [
                    'image' => $file_name,
                   'username' => $username,
                   'nama_depan' => $nama_depan,
                   'nama_belakang' => $nama_belakang,
               ];
               if (!empty($password_baru) && strlen($password_baru) >= 8) {
                   if ($password_baru === $konfirmasi_password) {
                       $data['password'] = md5($password_baru);
                   } else {
                       $this->session->set_flashdata('message', 'Password baru dan konfirmasi password harus sama');
                       redirect(base_url('karyawan/profile'));
                   }
               }
               $this->session->set_userdata($data);
               $update_result = $this->m_model->update('user', $data, array('id' => $this->session->userdata('id')));
               redirect(base_url('karyawan/profile'));
			} else {
				// Gagal mengunggah foto baru
				redirect(base_url('karyawan/profile'));
			}
		} else {
            $old_file = $this->m_model->get_foto_by_id($this->session->userdata('id'));
			// Jika tidak ada foto yang diunggah
			$data = [
                'image' => $old_file,
               'username' => $username,
               'nama_depan' => $nama_depan,
               'nama_belakang' => $nama_belakang,
           ];
           if (!empty($password_baru) && strlen($password_baru) >= 8) {
               if ($password_baru === $konfirmasi_password) {
                   $data['password'] = md5($password_baru);
               } else {
                   $this->session->set_flashdata('message', 'Password baru dan konfirmasi password harus sama');
                   redirect(base_url('karyawan/profile'));
               }
           }
           $this->session->set_userdata($data);
           $update_result = $this->m_model->update('user', $data, array('id' => $this->session->userdata('id')));
           redirect(base_url('karyawan/profile'));
		}
    }
    public function hapus_foto()
    {
     $foto= $this->m_model->get_foto_by_id($this->session->userdata('id'));
     if($foto !== 'User.png'){
        unlink('./images/' . $foto);
        $data =[
            'image' => 'User.png'
        ];
        $update_result = $this->m_model->update('user', $data, array('id' => $this->session->userdata('id')));
        redirect(base_url('karyawan/profile'));
     } else{
        redirect(base_url('karyawan/profile'));
     }
    }
}