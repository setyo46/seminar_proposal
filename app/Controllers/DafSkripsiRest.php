<?php

namespace App\Controllers;

use App\Models\DafSkripsiModel;
use CodeIgniter\RESTful\ResourceController;

class DafSkripsiRest extends ResourceController
{
    protected $modelName = 'App\Models\DafSkripsiModel';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'message' => 'success',
            'error' => false,
            'data_dafskripsi' => $this->model->getAll()
        ];

        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        try {
            $modelDafSem = new DafSkripsiModel();
            $uploadedFiles = [];

            // List of allowed file fields
            $allowedFields = [
                'id_dafskripsi',
                'nim_dafskripsi',
                'krs_dafskripsi',
                'transkrip_dafskripsi',
                'slip_dafskripsi',
            ];

            foreach ($allowedFields as $fieldName) {
                // Validate and move each file if present in the request
                if ($this->request->getFile($fieldName)) {
                    $uploadedFiles[$fieldName] = $this->validateAndMoveFile($fieldName)->getName();
                }
            }

            // Save file names to the database
            $data = array_merge(['nim_dafskripsi' => $this->request->getPost('nim_dafskripsi')], $uploadedFiles);
            $modelDafSem->insert($data);

            $response = [
                'error' => false,
                'message' => 'success',
                'upload_result' => $uploadedFiles
            ];

            // Return a success response
            return $this->respondCreated($response, 200);
        } catch (\Exception $e) {
            // Handle any exceptions or errors that may occur
            $response = [
                'error' => true,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ];

            // Return an error response
            return $this->respond($response, 500);
        }
    }

    private function validateAndMoveFile($fieldName)
    {
        $file = $this->request->getFile($fieldName);

        // Check if the file is present in the request
        if (!$file) {
            throw new \Exception("File $fieldName not found in the request");
        }

        // Check if the file is valid
        if (!$file->isValid()) {
            throw new \Exception("Invalid $fieldName file");
        }

        // Move the file to the 'upload' directory
        $file->move('upload');

        return $file;
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}