<?php

namespace App\Controllers;

//use App\Models\MahasiswaModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Mahasiswa extends ResourcePresenter
{
//    function __construct()
//    {
//        $this->mahasiswa = new MahasiswaModel();
//    }
    protected $modelName = 'App\Models\MahasiswaModel';
    protected $helpers = ['custom'];
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['tb_mahasiswa'] = $this->model->findAll();
        return view('mahasiswa/index' ,$data);
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        return view('mahasiswa/new');
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getPost();
        $this->model->insert($data);
        return redirect()->to(site_url('mahasiswa'))->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $tb_mahasiswa = $this->model->where('id_mhs', $id)->first();
        if (is_object($tb_mahasiswa)) {
            $data['tb_mahasiswa'] = $tb_mahasiswa;
            return view('mahasiswa/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException:: forPageNotFound();
        }
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = $this->request->getPost();

        // Check if password field is present in the data
        if(isset($data['password_mhs'])) {
            // Hash the password
            $data['password_mhs'] = password_hash($data['password_mhs'], PASSWORD_BCRYPT);
        }

        // Update the record in the database
        $this->model->update($id, $data);

        return redirect()->to(site_url('mahasiswa'))->with('success', 'Data Berhasil Diupdate');
    }


    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id = null)
    {
        //
    }

    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {

//        $this->model->where('id_mhs', $id)->delete();
        $this->model->delete($id);
        return redirect()->to(site_url('mahasiswa'))->with('success', 'Data Berhasil Dihapus');
    }
}
