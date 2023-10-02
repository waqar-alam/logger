<?php

// app/Http/Controllers/LogLevelTargetController.php

namespace App\Http\Controllers;

use App\Contracts\LogLevelTargetControllerInterface;
use App\Http\Requests\LogLevelTargetRequest;
use App\Services\LogLevelTargetService;
use App\Exceptions\LogLevelTargetNotFoundException;
use App\Exceptions\LogLevelTargetAlreadyExistsException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LogLevelTargetController extends Controller
{
    private $logLevelTargetService;

    public function __construct(LogLevelTargetServiceInterface $logLevelTargetService)
    {
        $this->logLevelTargetService = $logLevelTargetService;
    }

    public function show(int $id): JsonResponse
    {
        try {
            $logLevelTarget = $this->logLevelTargetService->getLogLevelTargetById($id);

            if (!$logLevelTarget) {
                throw new LogLevelTargetNotFoundException();
            }

            return response()->json(['data' => $logLevelTarget], 200);
        } catch (LogLevelTargetNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    public function index(): JsonResponse
    {
        $logLevelTargets = $this->logLevelTargetService->getAllLogLevelTargets();

        return response()->json(['data' => $logLevelTargets], 200);
    }

    public function store(LogLevelTargetRequest $request): JsonResponse
    {
        $data = $request->validated();

        $logLevelTarget = $this->logLevelTargetService->createLogLevelTarget($data);

        return response()->json(['data' => $logLevelTarget], 201);
    }

    public function update(LogLevelTargetRequest $request, int $id): JsonResponse
    {
        try {
            $data = $request->validated();

            $logLevelTarget = $this->logLevelTargetService->updateLogLevelTargetById($id, $data);

            return response()->json(['data' => $logLevelTarget], 200);
        } catch (LogLevelTargetNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->logLevelTargetService->deleteLogLevelTargetById($id);

            return response()->json(['message' => 'Log level target deleted successfully'], 204);
        } catch (LogLevelTargetNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }
}