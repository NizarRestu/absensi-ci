<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->library('upload');
        if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'admin') {
            redirect(base_url());
        }
    }
    public function profile()
	{
        $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
		$this->load->view('pages/admin/profile',$data);
	}
    public function karyawan()
	{
        $data['karyawan'] = $this->m_model->get_karyawan('user')->result();
		$this->load->view('pages/admin/karyawan',$data);
	}
    public function rekap_bulanan()
	{
        $bulan = $this->input->post('bulan'); // Ambil nilai bulan yang dipilih dari form
        $data['data_bulanan'] = $this->m_model->get_bulanan($bulan);
		$this->load->view('pages/admin/recap_bulanan',$data);
	}
    public function detail_karyawan($id)
	{
        $data['karyawan'] = $this-> m_model->get_by_id('user' , 'id', $id)->result();
		$this->load->view('pages/admin/detail_karyawan',$data);
	}
    public function dashboard()
	{
        $data['karyawan'] = $this-> m_model->get_karyawan('user')->num_rows();
        $data['absen'] = $this-> m_model->get_data('absensi')->num_rows();
		$this->load->view('pages/admin/dashboard',$data);
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
        $old_file = $this->m_model->get_foto_by_id($this->session->userdata('id'));
        if ($old_file != 'User.png') {
            unlink('./images/' . $old_file);
        }
        if (move_uploaded_file($foto_temp, $upload_path)) {
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
                    redirect(base_url('admin/profile'));
                }
            }
            
            $this->session->set_userdata($data);
            $update_result = $this->m_model->update('user', $data, array('id' => $this->session->userdata('id')));
            redirect(base_url('admin/profile'));
        } else {
            // Gagal mengunggah foto baru
            redirect(base_url('admin/profile'));
        }
    } else {
        // Jika tidak ada foto yang diunggah
        $data = [
            'username' => $username,
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang,
        ];
        
        if (!empty($password_baru) && strlen($password_baru) >= 8) {
            if ($password_baru === $konfirmasi_password) {
                $data['password'] = md5($password_baru);
            } else {
                $this->session->set_flashdata('message', 'Password baru dan konfirmasi password harus sama');
                redirect(base_url('admin/profile'));
            }
        }
        
        $this->session->set_userdata($data);
        $update_result = $this->m_model->update('user', $data, array('id' => $this->session->userdata('id')));
        redirect(base_url('admin/profile'));
    }
}

    public function hapus_foto()
    {
     $foto= $this->m_model->get_foto_by_id($this->session->userdata('id'));
     if($foto != 'User.png'){
        unlink('./images/' . $foto);
        $data =[
            'image' => 'User.png'
        ];
        $update_result = $this->m_model->update('user', $data, array('id' => $this->session->userdata('id')));
        redirect(base_url('admin/profile'));
     } else{
        redirect(base_url('admin/profile'));
     }
    }
    public function exportToExcel() {

        // Load autoloader Composer
        require 'vendor/autoload.php';
        
        $spreadsheet = new Spreadsheet();

        // Buat lembar kerja aktif
       $sheet = $spreadsheet->getActiveSheet();
        // Data yang akan diekspor (contoh data)
        $data = $this->m_model->get_karyawan('user')->result();
        
        // Buat objek Spreadsheet
        $headers = ['ID','NAMA KARYAWAN','USERNAME', 'EMAIL'];
        $rowIndex = 1;
        foreach ($headers as $header) {
            $sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
            $rowIndex++;
        }
        
        // Isi data dari database
        $rowIndex = 2;
        foreach ($data as $rowData) {
            $columnIndex = 1;
            $id = '';
            $nama_depan = '';
            $nama_belakang = '';
            $username = '';
            $email = ''; 
            foreach ($rowData as $cellName => $cellData) {
                if($cellName == 'id'){
                    $id = $cellData;
                }elseif ($cellName == 'nama_depan') {
                   $nama_depan = $cellData;
                } elseif ($cellName == 'nama_belakang') {
                    $nama_belakang = $cellData;
                } elseif ($cellName == 'username') {
                    $username = $cellData;
                } elseif ($cellName == 'email') {
                    $email = $cellData;
                }
        
                // Anda juga dapat menambahkan logika lain jika perlu
                
                // Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
                $columnIndex++;
            }
        
            // Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
            // Anda dapat mengisinya ke dalam lembar kerja Excel di sini
            $sheet->setCellValueByColumnAndRow(1, $rowIndex, $id);
            $sheet->setCellValueByColumnAndRow(2, $rowIndex, $nama_depan + " " + $nama_belakang);
            $sheet->setCellValueByColumnAndRow(3, $rowIndex, $username);
            $sheet->setCellValueByColumnAndRow(4, $rowIndex, $email);
        
            $rowIndex++;
        }
        // Auto size kolom berdasarkan konten
        foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
        
        // Set style header
        $headerStyle = [
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ];
        $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);
        
        // Konfigurasi output Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'DATA_KARYAWAN.xlsx'; // Nama file Excel yang akan dihasilkan
        
        // Set header HTTP untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        
        // Outputkan file Excel ke browser
        $writer->save('php://output');
        
    }
}