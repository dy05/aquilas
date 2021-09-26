<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    public string $model;

    /**
     * @return Builder
     */
    public function newQuery(): Builder
    {
        return (new ($this->model))->newQuery();
    }
}
