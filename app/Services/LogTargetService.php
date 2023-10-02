<?php

// app/Services/LogTargetService.php

namespace App\Services;

use App\Contracts\LogTargetServiceInterface;
use App\Exceptions\LogTargetNotFoundException;
use App\Exceptions\LogTargetAlreadyExistsException;
use App\Models\LogTarget;
use Illuminate\Database\Eloquent\Collection;

class LogTargetService implements LogTargetServiceInterface
{
    public function getLogTargetById(string $id): ?LogTarget
    {
        return LogTarget::find($id);
    }

    public function getAllLogTargets(): Collection
    {
        return LogTarget::all();
    }

    public function createLogTarget(array $data): LogTarget
    {
        if ($this->logTargetExists($data['name'])) {
            throw new LogTargetAlreadyExistsException("Log target with name '{$data['name']}' already exists.");
        }

        return LogTarget::create($data);
    }

    public function updateLogTargetById(string $id, array $data): LogTarget
    {
        $logTarget = $this->getLogTargetById($id);

        if (!$logTarget) {
            throw new LogTargetNotFoundException("Log target with ID '$id' not found.");
        }

        if ($data['name'] !== $logTarget->name && $this->logTargetExists($data['name'])) {
            throw new LogTargetAlreadyExistsException("Log target with name '{$data['name']}' already exists.");
        }

        $logTarget->update($data);

        return $logTarget;
    }

    public function deleteLogTargetById(string $id): void
    {
        $logTarget = $this->getLogTargetById($id);

        if (!$logTarget) {
            throw new LogTargetNotFoundException("Log target with ID '$id' not found.");
        }

        $logTarget->delete();
    }

    private function logTargetExists(string $name): bool
    {
        return LogTarget::where('name', $name)->exists();
    }
}
