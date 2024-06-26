<?php

namespace App\Models;

use CodeIgniter\Model;

class OperatorModel extends Model
{
    protected $table            = 'tb_user';
    protected $primaryKey       = 'id_user';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_user', 'id_dosen', 'username_user', 'password_user', 'level_userid'];

    function getAll()
    {
        $builder = $this->db->table('tb_user');
        $builder->select('tb_user.*, tb_dosen.nama_dosen AS nama_operator, tb_dosen.nidn_dosen AS nim_operator, 
        tb_dosen.alamat_dosen AS alamat_operator,  tb_dosen.nohp_dosen AS nohp_operator, tb_dosen.email_dosen
        AS email_operator, tb_auth.level_nama, tb_dosen.id_dosen');
        $builder->join('tb_dosen', 'tb_dosen.nidn_dosen = tb_user.username_user', 'left');
        $builder->join('tb_auth', 'tb_auth.level_nama = tb_user.level_userid', 'left');
        $query = $builder->get();
        return $query->getResult();
    }
}
