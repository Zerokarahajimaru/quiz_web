<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{
    protected $modelName = 'App\Models\UserModel';
    protected $format    = 'json';

    // GET /users → tampilkan semua data
    public function index()
    {
        $users = $this->model->findAll();
        return $this->respond($users);
    }

    // GET /users/{id} → tampilkan 1 user
    public function show($id = null)
    {
        $user = $this->model->find($id);
        if (!$user) {
            return $this->failNotFound("User dengan ID $id tidak ditemukan");
        }
        return $this->respond($user);
    }

    // POST /users → tambah user baru
    public function create()
    {
        $data = $this->request->getJSON(true);
        if ($this->model->insert($data)) {
            return $this->respondCreated($data, 'User berhasil ditambahkan');
        }
        return $this->failValidationErrors($this->model->errors());
    }

    // PUT /users/{id} → update user
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);
        if ($this->model->update($id, $data)) {
            return $this->respondUpdated($data, 'User berhasil diupdate');
        }
        return $this->failValidationErrors($this->model->errors());
    }

    // DELETE /users/{id} → hapus user
    public function delete($id = null)
    {
        if ($this->model->delete($id)) {
            return $this->respondDeleted(['id' => $id], 'User berhasil dihapus');
        }
        return $this->failNotFound("User dengan ID $id tidak ditemukan");
    }
}
