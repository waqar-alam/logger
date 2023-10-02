<?php

// app/Http/Controllers/LogTargetController.php

namespace App\Http\Controllers;

use App\Contracts\LogTargetControllerInterface;
use App\Http\Requests\LogTargetRequest;
use App\Services\LogTargetService;
use App\Exceptions\LogTargetNotFoundException;
use App\Exceptions\LogTargetAlreadyExistsException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LogTargetController extends Controller implements LogTargetControllerInterface {
    private $logTargetService;

    public function __construct(LogTargetService $logTargetService)
    {
        $this->logTargetService = $logTargetService;
    }

    // Method to send a log entry to the console
    public function sendLogToConsole(string $logEntry): JsonResponse
    {
        try {
            // Log the entry to the console
            Log::info($logEntry);

            // Return a response indicating success
            return response()->json(['message' => 'Log entry sent to console successfully'], 200);
        } catch (\Exception $e) {
            // Handle any exceptions if needed
            return response()->json(['message' => 'Failed to send log entry to console'], 500);
        }
    }

    public function show(string $id): JsonResponse
    {
        try {
            $logTarget = $this->logTargetService->getLogTargetById($id);

            if (!$logTarget) {
                throw new LogTargetNotFoundException();
            }

            return response()->json(['data' => $logTarget], 200);
        } catch (LogTargetNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    public function index(): JsonResponse
    {
        try {
            $logTargets = $this->logTargetService->getAllLogTargets();

            return response()->json(['data' => $logTargets], 200);
        } catch (LogTargetNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    public function store(LogTargetRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            
            $logTarget = $this->logTargetService->createLogTarget($data);

            return response()->json(['data' => $logTarget], 201);
        } catch (LogTargetAlreadyExistsException $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    public function update(LogTargetRequest $request, string $id): JsonResponse
    {
        try {
            $data = $request->validated();
            
            $logTarget = $this->logTargetService->updateLogTargetById($id, $data);

            return response()->json(['data' => $logTarget], 200);
        } catch (LogTargetNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    public function destroy(string $id): JsonResponse
    {
        try {
            $this->logTargetService->deleteLogTargetById($id);

            return response()->json(['message' => 'Log target deleted successfully'], 204);
        } catch (LogTargetNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }
}

