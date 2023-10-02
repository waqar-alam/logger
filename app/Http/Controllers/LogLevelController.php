<?php

namespace App\Http\Controllers;

use App\Contracts\LogLevelControllerInterface;
use App\Exceptions\LogLevelNotFoundException;
use App\Http\Requests\LogLevelRequest;
use App\Services\LogLevelService;
use Illuminate\Http\JsonResponse;

class LogLevelController extends Controller implements LogLevelControllerInterface
{
    private $logLevelService;

    public function __construct(LogLevelService $logLevelService)
    {
        $this->logLevelService = $logLevelService;
    }

    public function show(string $name): JsonResponse
    {
        try {
            $logLevel = $this->logLevelService->getLogLevelByName($name);

            if (!$logLevel) {
                throw new LogLevelNotFoundException();
            }

            return response()->json(['data' => ['id' => $logLevel->id]], 200);
        } catch (LogLevelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    public function index(): JsonResponse
    {
        try {
            $logLevels = $this->logLevelService->getAllLogLevels();

            return response()->json(['data' => $logLevels], 200);
        } catch (LogLevelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    public function store(LogLevelRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            
            $logLevel = $this->logLevelService->createLogLevel($data);

            return response()->json(['data' => $logLevel], 201);
        } catch (LogLevelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    public function update(LogLevelRequest $request, string $name): JsonResponse
    {
        try {
            $data = $request->validated();
            
            $logLevel = $this->logLevelService->updateLogLevelByName($name, $data);

            return response()->json(['data' => $logLevel], 200);
        } catch (LogLevelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    public function destroy(string $name): JsonResponse
    {
        try {
            $this->logLevelService->deleteLogLevelByName($name);

            return response()->json(['message' => 'Log level deleted successfully'], 204);
        } catch (LogLevelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }
}
