<?php

namespace App\Repositories\Eloquent;

use App\Models\Marvel;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\MarvelRepositoryInterface;

class MarvelRepository extends BaseRepository implements MarvelRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(new Marvel());

    }

}