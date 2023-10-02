<?php

// app/Repositories/LogLevelRepository.php

namespace App\Repositories;

use App\Models\LogLevel;

class LogLevelRepository
{
    protected $model;

    public function __construct(LogLevel $model)
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

    // Add other methods for log level-related operations

    public function getLogsWithLevel($levelId)
    {
        return $this->model->find($levelId)->logs;
    }
}
