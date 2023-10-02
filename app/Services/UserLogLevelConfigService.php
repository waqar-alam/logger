<?php

// app/Services/UserLogLevelConfigService.php

namespace App\Services;

use App\Contracts\UserLogLevelConfigServiceInterface;
use App\Exceptions\UserLogLevelConfigNotFoundException;
use App\Models\User;
use App\Models\UserLogLevelConfig;

class UserLogLevelConfigService implements UserLogLevelConfigServiceInterface
{
    public function getLogLevelConfigByUserId(int $userId): ?UserLogLevelConfig
    {
        return UserLogLevelConfig::where('user_id', $userId)->first();
    }

    public function createOrUpdateLogLevelConfig(int $userId, string $logLevel): UserLogLevelConfig
    {
        $user = User::find($userId);

        if (!$user) {
            throw new UserLogLevelConfigNotFoundException("User with ID '$userId' not found.");
        }

        $config = UserLogLevelConfig::updateOrCreate(
            ['user_id' => $userId],
            ['log_level_preference' => $logLevel]
        );

        return $config;
    }

    public function deleteLogLevelConfigByUserId(int $userId): void
    {
        UserLogLevelConfig::where('user_id', $userId)->delete();
    }
}

