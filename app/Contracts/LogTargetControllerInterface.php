<?php

namespace App\Contracts;

use App\Models\LogTarget;
use Illuminate\Support\Collection;

interface LogTargetServiceInterface
{
    public function getLogTargetById(int $id): ?LogTarget;

    public function getAllLogTargets(): Collection;

    public function createLogTarget(array $data): LogTarget;

    public function updateLogTargetById(int $id, array $data): ?LogTarget;

    public function deleteLogTargetById(int $id): void;
}


