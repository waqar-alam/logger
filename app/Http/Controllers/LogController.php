<?php

// app/Http/Controllers/LogController.php

use App\Contracts\LogControllerInterface;
use App\Http\Requests\LogRequest;
use App\Services\LogService;
use App\Exceptions\LogNotFoundException;
use App\Exceptions\LogAlreadyExistsException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LogController extends Controller
{
    private $logService;

    public function __construct(LogServiceInterface $logService)
    {
        $this->logService = $logService;
    }

    public function index(): JsonResponse
    {
        $logs = $this->logService->getAllLogs();

        return response()->json(['data' => $logs], 200);
    }

    public function show(int $id): JsonResponse
    {
        $log = $this->logService->getLogById($id);

        if (!$log) {
            return response()->json(['message' => 'Log not found'], 404);
        }

        return response()->json(['data' => $log], 200);
    }

    public function store(LogRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            // Check if a log entry with the same data already exists
            if ($this->logService->logEntryExists($data)) {
                throw new LogAlreadyExistsException();
            }

            $log = $this->logService->createLog($data);

            return response()->json(['data' => $log], 201);
        } catch (LogAlreadyExistsException $e) {
            return response()->json(['message' => $e->getMessage()], 409); // HTTP status code 409 for conflict
        }
    }

    public function update(LogRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();
        $log = $this->logService->updateLogById($id, $data);

        if (!$log) {
            return response()->json(['message' => 'Log not found'], 404);
        }

        return response()->json(['data' => $log], 200);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->logService->deleteLogById($id);

        return response()->json(['message' => 'Log deleted successfully'], 204);
    }
}
