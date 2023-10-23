<?php
class M_model extends CI_Model
{
    //function get data keseluruhan
    public function get_data($table)
    {
        return $this->db->get($table);
    }
    //function get data dengan mencari salah satu row
    public function getwhere($table, $data)
    {
        return $this->db->get_where($table, $data);
    }
    //function hapus data
    public function delete($table, $field, $id)
    {
        $data = $this->db->delete($table, array($field => $id));
        return $data;
    }
    //function tambah data
    public function add($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    //function update data
    public function update($table, $data, $where)
    {
        $data = $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }
    //function mengambil satu data menggunakan id
    public function get_by_id($table, $id_column, $id)
    {
        $data = $this->db->where($id_column, $id) -> get($table);
        return $data;
    }
    //function mengambil data absen menggunakan id user
    public function get_history($table, $id_karyawan)
    {
    return $this->db->where('id_karyawan', $id_karyawan)->get($table);
    }
    //function mengambil data absen menggunakan id user dan keterangan izin NULL
    public function get_absen($table, $id_karyawan)
    {
    return $this->db->where('id_karyawan', $id_karyawan)
                    ->where('keterangan_izin', '-')
                    ->get($table);
    }
    //function mengambil data absen menggunakan id user dan kegiatan NULL
    public function get_izin($table, $id_karyawan)
    {
    return $this->db->where('id_karyawan', $id_karyawan)
                    ->where('kegiatan', '-')
                    ->get($table);
    }
    //function mengambil data absen menggunakan id user , keterangan izin NULL , status not dan tanggal
    public function get_absen_by_tanggal($tanggal, $id_karyawan)
    {
    return $this->db->where('id_karyawan', $id_karyawan)
                    ->where('date', $tanggal)
                    ->where('keterangan_izin', '-')
                    ->where('status', 'not')
                    ->get('absensi');
    }
     //function mengambil data absen menggunakan id user , kegiatan NULL , status not dan tanggal
    public function get_izin_by_tanggal($tanggal, $id_karyawan)
    {
    return $this->db->where('id_karyawan', $id_karyawan)
                    ->where('date', $tanggal)
                    ->where('kegiatan', '-')
                    ->get('absensi');
    }
    //function mengambil foto menggunakan id
    public function get_foto_by_id($id)
    {
        $this->db->select('image');
        $this->db->from('user');
        $this->db->where('id', $id);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->image;
        } else {
            return false;
        }
    }
    //function mengambil data karyawan dengan role karyawan
    public function get_karyawan($table)
    {
    return $this->db->where('role', 'karyawan')
                    ->get($table);
    }
    //function mengambil data absensi menggunakan bulan saat ini
    public function get_bulanan($date)
    {
        $this->db->from('absensi');
        $this->db->where("DATE_FORMAT(absensi.date, '%m') =", $date);
        $query = $this->db->get();
        return $query->result();
    }
    //function mengambil data absensi menggunakan bulan saat ini dan ada pagination nya
    public function get_bulanan_page($limit, $offset ,$date)
    {
        $this->db->where("DATE_FORMAT(absensi.date, '%m') =", $date);
        $this->db->limit($limit, $offset);
        $query = $this->db->get('absensi');
        return $query->result();
    }
    //function menghitung data absensi menggunakan bulan saat ini
    public function count_bulanan($date) {
        $this->db->where("DATE_FORMAT(absensi.date, '%m') =", $date);
        return $this->db->count_all_results('absensi'); 
    }
    //function menghitung data absensi 
    public function count_absen() {
        return $this->db->count_all_results('absensi'); 
    }
    //function memgambil data absensi 
    public function get_absen_page($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $query = $this->db->get('absensi');
        return $query->result();
    }
    //function mengambil data absensi menggunakan tahun saat ini dan ada pagination nya
    public function get_tahunan_page($limit, $offset ,$date)
    {
        $this->db->where("DATE_FORMAT(absensi.date, '%Y') =", $date);
        $this->db->limit($limit, $offset);
        $query = $this->db->get('absensi');
        return $query->result();
    }
    //function mengambil data absensi menggunakan tahun saat ini
    public function count_tahunan($date) {
        $this->db->where("DATE_FORMAT(absensi.date, '%Y') =", $date);
        return $this->db->count_all_results('absensi'); 
    }
    //function mengambil data absensi menggunakan tahun saat ini
    public function get_tahunan($date)
    {
        $this->db->from('absensi');
        $this->db->where("DATE_FORMAT(absensi.date, '%Y') =", $date);
        $query = $this->db->get();
        return $query->result();
    }
    //function mengambil data absensi menggunakan tanggal saat ini dan ada pagination nya
    public function get_harian_page($limit, $offset ,$date)
    {
        $this->db->where('date =', $date);
        $this->db->limit($limit, $offset);
        $query = $this->db->get('absensi');
        return $query->result();
    }
    //function menghitung data absensi menggunakan tanggal saat ini
    public function count_harian($date)
    {
        $this->db->where('date =', $date);
        return $this->db->count_all_results('absensi'); 
    }
    //function mengambil data absensi menggunakan tanggal saat ini
    public function get_harian($date)
    {
    $this->db->from('absensi');
    $this->db->where('date =', $date);
    $query = $this->db->get();
    return $query->result();
    }
    //function mengambil data absensi menggunakan antara tanggal  saat ini dan tanggal 7 hari sebelum nya
    public function get_mingguan()
    {
        $this->load->database();
        $end_date = date('Y-m-d');
        $start_date = date('Y-m-d', strtotime('-7 days', strtotime($end_date)));        
        $query = $this->db->select('date,id, kegiatan,id_karyawan, jam_masuk, jam_pulang, keterangan_izin, status, COUNT(*) AS total_absences')
                          ->from('absensi')
                          ->where('date >=', $start_date)
                          ->where('date <=', $end_date)
                          ->group_by('date, id_karyawan, kegiatan, jam_masuk, jam_pulang, keterangan_izin, status,id')
                          ->get();
        return $query->result_array();
    }
    //function mengambil data absensi menggunakan id karyawan
    public function count_history($karyawan_id) 
    {
        $this->db->where('id_karyawan', $karyawan_id);
        return $this->db->count_all_results('absensi'); 
    }
    //function mengambil data absensi menggunakan id karyawan dan ada pagination nya
    public function get_history_page($limit, $offset, $karyawan_id) 
    {
        $this->db->where('id_karyawan', $karyawan_id);
        $this->db->limit($limit, $offset);
        $query = $this->db->get('absensi'); 
        return $query->result();
    }
    //function menghitung data karyawan menggunakan role karyawan
    public function count_karyawan() 
    {
        $this->db->where('role', 'karyawan');
        return $this->db->count_all_results('user'); 
    }
    //function menggambil data karyawan menggunakan role karyawan dan ada pagination nya
    public function get_karyawan_page($limit, $offset) {
        $this->db->where('role', 'karyawan');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('user'); 
        return $query->result();
    }
}
