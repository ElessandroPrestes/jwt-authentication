<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function findAll();

    public function findByUuid($uuid);

    public function store(array $data);

    public function update($uuid, array $data);

    public function destroy($uuid);
}