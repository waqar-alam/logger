<?php

// app/Repositories/LogTargetRepository.php

namespace App\Repositories;

use App\Models\LogTarget;

class LogTargetRepository
{
    protected $model;

    public function __construct(LogTarget $model)
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

    // Add other methods for log target-related operations
}
