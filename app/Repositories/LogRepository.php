<?php

// app/Repositories/LogRepository.php

namespace App\Repositories;

use App\Models\Log;

class LogRepository
{
    protected $model;

    public function __construct(Log $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    // Add other methods for log-related operations
}
