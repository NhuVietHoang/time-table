<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function getAll();
    public function find($id);
    public function findOrFail($id);
    public function store(array $data);
    public function update(array $data, $id);
    public function delete($id);
}
