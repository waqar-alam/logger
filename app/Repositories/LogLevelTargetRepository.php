<?php

// app/Repositories/LogLevelTargetRepository.php

namespace App\Repositories;

use App\Models\LogLevelTarget;

class LogLevelTargetRepository
{
    protected $model;

    public function __construct(LogLevelTarget $model)
    {
        $this->model = $model;
    }

    public function getByLevelAndTarget($levelId, $targetId)
    {
        return $this->model->where('log_level_id', $levelId)->where('log_target_id', $targetId)->first();
    }

    // Add other methods for log level target-related operations
}
