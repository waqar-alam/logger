<?php

// app/Http/Controllers/UserLogLevelConfigController.php

namespace App\Http\Controllers;

use App\Http\Requests\UserLogLevelConfigRequest;
use App\Services\UserLogLevelConfigService;
use Illuminate\Http\JsonResponse;

class UserLogLevelConfigController extends Controller
{
    private $userLogLevelConfigService;

    public function __construct(UserLogLevelConfigService $userLogLevelConfigService)
    {
        $this->userLogLevelConfigService = $userLogLevelConfigService;
    }

    public function getConfig(int $userId): JsonResponse
    {
        $config = $this->userLogLevelConfigService->getLogLevelConfigByUserId($userId);

        return response()->json(['data' => $config], 200);
    }

    public function updateConfig(UserLogLevelConfigRequest $request, int $userId): JsonResponse
    {
        $data = $request->validated();
        $config = $this->userLogLevelConfigService->createOrUpdateLogLevelConfig($userId, $data['log_level']);

        return response()->json(['data' => $config], 200);
    }

    public function deleteConfig(int $userId): JsonResponse
    {
        $this->userLogLevelConfigService->deleteLogLevelConfigByUserId($userId);

        return response()->json(['message' => 'User log level configuration deleted successfully'], 204);
    }
}

