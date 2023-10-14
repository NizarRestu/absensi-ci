<?php
function tampil_nama_karawan_byid($id)
{
    $ci = &get_instance();
    $ci -> load->database();
    $result = $ci->db->where('id', $id)->get('user');
    foreach ($result->result() as $c) {
        $stmt = $c->nama_depan . ' ' . $c->nama_belakang;
        return $stmt;
    }
}
?>