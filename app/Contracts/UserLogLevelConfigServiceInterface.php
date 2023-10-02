<?php

// app/Contracts/UserLogLevelConfigServiceInterface.php

namespace App\Contracts;

use App\Models\UserLogLevelConfig;

interface UserLogLevelConfigServiceInterface
{
    /**
     * Get a user's log level configuration by user ID.
     *
     * @param int $userId
     * @return UserLogLevelConfig|null
     */
    public function getLogLevelConfigByUserId(int $userId);

    /**
     * Create or update a user's log level configuration.
     *
     * @param int $userId
     * @param string $logLevel
     * @return UserLogLevelConfig
     */
    public function createOrUpdateLogLevelConfig(int $userId, string $logLevel);

    /**
     * Delete a user's log level configuration by user ID.
     *
     * @param int $userId
     * @return void
     */
    public function deleteLogLevelConfigByUserId(int $userId);
}
