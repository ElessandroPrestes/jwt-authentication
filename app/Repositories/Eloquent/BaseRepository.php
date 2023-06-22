<?php

namespace App\Repositories\Eloquent;

use App\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;


class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(
        protected Model $model
    )
    {

    }

    public function findAll()
    {
        return $this->model->get();
    }

    public function findByUuid($uuid)
    {
        return $this->model->where('uuid',$uuid)->firstOrFail();
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function update($uuid, array $data)
    {
        
        $edit = $this->model->where('uuid',$uuid)->firstOrFail();
       
        $edit->update($data);
        
        return $edit;

    }

    public function destroy($uuid)
    {
        $destroyed = $this->model->where('uuid',$uuid)->firstOrFail();

        return $destroyed->delete();

    }
}