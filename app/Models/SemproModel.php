<?php

namespace App\Models;

use CodeIgniter\Model;

class SemproModel extends Model
{
    protected $table = 'tb_sempro';
    protected $primaryKey = 'id_sempro';

    protected $returnType = 'object';

    protected $allowedFields = [
        'id_sempro',
        'id_dafsempro',
        'nama_ruanganid',
        'jam_sempro',
        'tanggal_sempro',
        'penguji1_sempro',
        'penguji2_sempro',
        'penguji3_sempro',
        'status_sempro',
        'hasil_sempro'
    ];

    public function getAll()
    {
        $builder = $this->db->table('tb_sempro');
        $builder->select('tb_sempro.*, tb_ruangan.nama_ruangan, tb_dafskripsi.nim_dafskripsi AS nim_sempro, 
        m.nama_mhs AS nama_sempro, tb_dafsempro.status_dafsempro, d.dosen1_dosbing AS dosen1_sempro, 
            d.dosen2_dosbing AS dosen2_sempro ');
        $builder->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_sempro.nama_ruanganid', 'left');
        $builder->join('tb_dafsempro', 'tb_dafsempro.id_dafsempro = tb_sempro.id_dafsempro', 'left');
        $builder->join('tb_dafskripsi', 'tb_dafskripsi.id_dafskripsi = tb_dafsempro.id_dafskripsi', 'left');
        $builder->join('tb_mahasiswa m', 'm.nim_mhs = tb_dafskripsi.nim_dafskripsi', 'left');
        $builder->join('tb_dosbing d', 'd.dafskripsiid_dosbing = tb_dafskripsi.id_dafskripsi', 'left');

        $query = $builder->get();
        return $query->getResult();
    }

    public function getAllMhs($id_dafsempro = null)
    {
        $builder = $this->db->table('tb_sempro');
        $builder->select('tb_sempro.*, tb_ruangan.nama_ruangan, tb_dafskripsi.nim_dafskripsi AS nim_sempro, 
        m.nama_mhs AS nama_sempro, tb_dafsempro.status_dafsempro, d.dosen1_dosbing AS dosen1_sempro, 
            d.dosen2_dosbing AS dosen2_sempro ');
        $builder->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_sempro.nama_ruanganid', 'left');
        $builder->join('tb_dafsempro', 'tb_dafsempro.id_dafsempro = tb_sempro.id_dafsempro', 'left');
        $builder->join('tb_dafskripsi', 'tb_dafskripsi.id_dafskripsi = tb_dafsempro.id_dafskripsi', 'left');
        $builder->join('tb_mahasiswa m', 'm.nim_mhs = tb_dafskripsi.nim_dafskripsi', 'left');
        $builder->join('tb_dosbing d', 'd.dafskripsiid_dosbing = tb_dafskripsi.id_dafskripsi', 'left');

        if ($id_dafsempro !== null) {
            $builder->where('tb_sempro.id_dafsempro', $id_dafsempro);
        }

        $query = $builder->get();
        return $query->getResult();
    }

    public function getDosenNameById($id)
    {
        return $this->db->table('tb_dosen')
            ->select('nama_dosen')
            ->where('id_dosen', $id)
            ->get()
            ->getRow()
            ->nama_dosen;
    }
}
