<?php

namespace App\Models;

use CodeIgniter\Model;

class DosbingModel extends Model
{
    protected $table            = 'tb_dosbing';
    protected $primaryKey       = 'id_dosbing';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_dosbing','dafskripsiid_dosbing', 'dosen1_dosbing', 'dosen2_dosbing', 'tanggal_dosbing'];

    public function getAll($id_dafskripsi = null)
    {
        $builder = $this->db->table('tb_dosbing');
        $builder->select('tb_dosbing.*, tb_dafskripsi.nim_dafskripsi, m.nama_mhs AS nama_mhs, 
                d1.nama_dosen AS nama_dosen1, d2.nama_dosen AS nama_dosen2, tb_dafskripsi.status_dafskripsi');

        $builder->join('tb_dafskripsi', 'tb_dafskripsi.id_dafskripsi = tb_dosbing.dafskripsiid_dosbing ', 'left');
        $builder->join('tb_mahasiswa m',    'm.nim_mhs = tb_dafskripsi.nim_dafskripsi', 'left');
        $builder->join('tb_dosen d1', 'd1.id_dosen = tb_dosbing.dosen1_dosbing', 'left');
        $builder->join('tb_dosen d2', 'd2.id_dosen = tb_dosbing.dosen2_dosbing', 'left');

        if ($id_dafskripsi !== null) {
            $builder->where('tb_dosbing.dafskripsiid_dosbing', $id_dafskripsi);
        }

        $query = $builder->get();
        return $query->getResult();
    }

    public function getDosenNameById($id_dosen)
    {
        $builder = $this->db->table('tb_dosen');
        $builder->select('nama_dosen');
        $builder->where('id_dosen', $id_dosen);
        $query = $builder->get();
        $result = $query->getRow();

        return ($result) ? $result->nama_dosen : null;
    }
}
