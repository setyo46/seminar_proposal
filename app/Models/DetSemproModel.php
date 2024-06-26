<?php

namespace App\Models;

use CodeIgniter\Model;

class DetSemproModel extends Model
{
    protected $table            = 'tb_detsempro';
    protected $primaryKey       = 'id_detsempro';
    protected $returnType       = 'object';

    protected $allowedFields    = [
        'id_detsempro',
        'id_dafsempro',
        'id_sempro',
        'id_dosen',
        'judul',
        'latar_belakang',
        'rumusan_masalah',
        'batasan_masalah',
        'tujuan',
        'manfaat',
        'tinjauan_pustaka',
        'metodologi',
        'kerangka_pemikiran',
        'jadwal_kegiatan',
        'riwayat_penilitian',
        'daftar_pustaka',
        'leveldosen_detsempro',
        'tanggal_detsempro',
        'nama_detsempro'
    ];

    public function getAll($id_dosen = null)
    {
        $builder = $this->db->table('tb_detsempro');
        $builder->select(
            'tb_detsempro.*,
            tb_sempro.tanggal_sempro,
            tb_dafsempro.tanggal_dafsempro,
            tb_sempro.jam_sempro,
            tb_sempro.nama_ruanganid, 
            tb_sempro.hasil_sempro,
            tb_sempro.status_sempro,
            tb_sempro.penguji1_sempro,
            tb_sempro.penguji2_sempro,
            tb_sempro.penguji3_sempro,
            tb_dafsempro.status_dafsempro,
            tb_dafsempro.judul_dafsempro,
            tb_dafskripsi.nim_dafskripsi AS nim_detsempro, 
            m.nama_mhs AS nama_detsempro, 
            tb_ruangan.nama_ruangan'
        );
        $builder->join('tb_sempro', 'tb_sempro.id_sempro = tb_detsempro.id_sempro', 'left');
        $builder->join('tb_dafsempro', 'tb_dafsempro.id_dafsempro = tb_detsempro.id_dafsempro', 'left');
        $builder->join('tb_dafskripsi', 'tb_dafskripsi.id_dafskripsi = tb_dafsempro.id_dafskripsi', 'left');
        $builder->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_sempro.nama_ruanganid', 'left');
        $builder->join('tb_dosen', 'tb_dosen.id_dosen = tb_detsempro.id_dosen', 'left');
        $builder->join('tb_mahasiswa m', 'm.nim_mhs = tb_dafskripsi.nim_dafskripsi', 'left');

        if ($id_dosen !== null) {
            $builder->where('tb_detsempro.id_dosen', $id_dosen);
        }

        $query = $builder->get();
        return $query->getResult();
    }

    public function getAllPenilaian($id_sempro = null)
    {
        $builder = $this->db->table('tb_detsempro');
        $builder->select(
            'tb_detsempro.*,
            tb_sempro.tanggal_sempro,
            tb_dafsempro.tanggal_dafsempro,
            tb_dosen.nama_dosen AS namadosen_detsempro,
            tb_sempro.jam_sempro,
            tb_sempro.nama_ruanganid, 
            tb_sempro.hasil_sempro,
            tb_sempro.status_sempro,
            tb_dafsempro.status_dafsempro,
            tb_dafsempro.judul_dafsempro,
            tb_dafskripsi.nim_dafskripsi AS nim_detsempro, 
            m.nama_mhs AS nama_detsempro, 
            tb_ruangan.nama_ruangan'
        );
        $builder->join('tb_sempro', 'tb_sempro.id_sempro = tb_detsempro.id_sempro', 'left');
        $builder->join('tb_dafsempro', 'tb_dafsempro.id_dafsempro = tb_detsempro.id_dafsempro', 'left');
        $builder->join('tb_dafskripsi', 'tb_dafskripsi.id_dafskripsi = tb_dafsempro.id_dafskripsi', 'left');
        $builder->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_sempro.nama_ruanganid', 'left');
        $builder->join('tb_dosen', 'tb_dosen.id_dosen = tb_detsempro.id_dosen', 'left');
        $builder->join('tb_mahasiswa m', 'm.nim_mhs = tb_dafskripsi.nim_dafskripsi', 'left');

        if ($id_sempro !== null) {
            $builder->where('tb_detsempro.id_sempro', $id_sempro);
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
