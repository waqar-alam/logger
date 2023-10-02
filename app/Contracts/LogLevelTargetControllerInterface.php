<?php

// app/Contracts/LogLevelTargetControllerInterface.php

namespace App\Contracts;

use Illuminate\Http\JsonResponse;

interface LogLevelTargetControllerInterface
{
    public function show(int $id): JsonResponse;
    public function index(): JsonResponse;
    public function store(array $data): JsonResponse;
    public function update(int $id, array $data): JsonResponse;
    public function destroy(int $id): JsonResponse;
}
