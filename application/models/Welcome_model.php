<?php

class Welcome_model extends CI_Model
{

    public function getPresensi()
    {
        $this->db->select('presensi.*, siswa.name as name_siswa, guru.name as name_guru');
        $this->db->join('siswa', 'presensi.id_siswa=siswa.id');
        $this->db->join('guru', 'presensi.id_guru=guru.id');

        $presensi = $this->db->get('presensi')->result_array();

        if ($presensi) {

            foreach ($presensi as $row) {

                $row['total_hari'] = $this->tgl_presensi($row['id']);
                $row['jumlah_hari'] = $this->jumlah_hari($row['id']);

                $newPresensi[] = $row;
            }
        } else {
            $newPresensi = [];
        }

        return $newPresensi;
    }


    public function tgl_presensi($id_presensi)
    {
        $this->db->select('presensi_tgl_ajar.tgl_ajar');
        $this->db->where('id_presensi', $id_presensi);
        return $this->db->get('presensi_tgl_ajar')->result_array();
    }

    public function jumlah_hari($id_presensi)
    {
        $this->db->select('presensi_tgl_ajar.tgl_ajar');
        $this->db->where('id_presensi', $id_presensi);
        return $this->db->get('presensi_tgl_ajar')->num_rows();
    }
}
