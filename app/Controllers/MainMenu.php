<?php

namespace App\Controllers;

class MainMenu extends BaseController
{
    public function index()
    {
        // cara 1 : query builder
        $builder = $this->db->table('tb_dosen');
        $query   = $builder->get();

        //cara 2 : query manual
        $query = $this->db->query("SELECT * FROM tb_dosen");


        $data['tb_dosen'] = $query->getResult();
        return view('main_menu/get' , $data);
    }

    public function create() {
        return view('main_menu/add');
    }

    public function store() {

        // method 1 : same name
        $data = $this->request->getPost();

        $this->db->table('tb_dosen')->insert($data);

        if($this->db->affectedRows() > 0 ) {
            return redirect()->to(site_url('main_menu'))->with('success', 'Data Berhasil Disimpan');
        }
    }
}
