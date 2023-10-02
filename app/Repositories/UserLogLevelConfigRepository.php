<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserLogLevelConfig;

class UserLogLevelConfigRepository
{
    /**
     * Get the log level configuration for a user by user ID.
     *
     * @param int $userId
     * @return UserLogLevelConfig|null
     */
    public function getLogLevelConfigByUserId(int $userId): ?UserLogLevelConfig
    {
        return UserLogLevelConfig::where('user_id', $userId)->first();
    }

    /**
     * Create or update the log level configuration for a user.
     *
     * @param int $userId
     * @param string $logLevelPreference
     * @return UserLogLevelConfig
     */
    public function createOrUpdateLogLevelConfig(int $userId, string $logLevelPreference): UserLogLevelConfig
    {
        $config = UserLogLevelConfig::updateOrCreate(
            ['user_id' => $userId],
            ['log_level_preference' => $logLevelPreference]
        );

        return $config;
    }

    /**
     * Delete the log level configuration for a user by user ID.
     *
     * @param int $userId
     * @return void
     */
    public function deleteLogLevelConfigByUserId(int $userId): void
    {
        UserLogLevelConfig::where('user_id', $userId)->delete();
    }
}
