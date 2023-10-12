<?php
class M_model extends CI_Model
{
    public function get_data($table)
    {
        return $this->db->get($table);
    }
    public function getwhere($table, $data)
    {
        return $this->db->get_where($table, $data);
    }
    public function delete($table, $field, $id)
    {
        $data = $this->db->delete($table, array($field => $id));
        return $data;
    }
    public function add($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function update($table, $data, $where)
    {
        $data = $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }
    public function get_by_id($table, $id_column, $id)
    {
        $data = $this->db->where($id_column, $id) -> get($table);
        return $data;
    }
    public function get_history($table, $id_karyawan)
{
    return $this->db->where('id_karyawan', $id_karyawan)->get($table);
}
    public function get_absen($table, $id_karyawan)
    {
    return $this->db->where('id_karyawan', $id_karyawan)
                    ->where('keterangan_izin', '-')
                    ->get($table);
    }
    public function get_izin($table, $id_karyawan)
    {
    return $this->db->where('id_karyawan', $id_karyawan)
                    ->where('kegiatan', '-')
                    ->get($table);
    }
    public function get_absen_by_tanggal($tanggal, $id_karyawan)
    {
    return $this->db->where('id_karyawan', $id_karyawan)
                    ->where('date', $tanggal)
                    ->where('keterangan_izin', '-')
                    ->where('status', 'not')
                    ->get('absensi');
    }
    public function get_izin_by_tanggal($tanggal, $id_karyawan)
    {
    return $this->db->where('id_karyawan', $id_karyawan)
                    ->where('date', $tanggal)
                    ->where('kegiatan', '-')
                    ->get('absensi');
    }
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

}
