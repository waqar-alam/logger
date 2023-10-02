<?php

namespace App\Services;

use App\Contracts\Services\LogLevelTargetServiceInterface;
use App\Models\LogLevelTarget;

class LogLevelTargetService implements LogLevelTargetServiceInterface
{
    public function getLogLevelTargetById(int $id): ?LogLevelTarget
    {
        return LogLevelTarget::find($id);
    }

    public function getAllLogLevelTargets(): array
    {
        return LogLevelTarget::all()->toArray();
    }

    public function createLogLevelTarget(array $data): LogLevelTarget
    {
        return LogLevelTarget::create($data);
    }

    public function updateLogLevelTargetById(int $id, array $data): ?LogLevelTarget
    {
        $logLevelTarget = LogLevelTarget::find($id);

        if (!$logLevelTarget) {
            return null;
        }

        $logLevelTarget->update($data);

        return $logLevelTarget;
    }

    public function deleteLogLevelTargetById(int $id): bool
    {
        $logLevelTarget = LogLevelTarget::find($id);

        if (!$logLevelTarget) {
            return false;
        }

        return $logLevelTarget->delete();
    }
}
