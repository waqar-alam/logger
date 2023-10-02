<?php

// app/Contracts/LogControllerInterface.php

namespace App\Contracts;

use App\Models\Log;
use App\Models\LogLevel;
use App\Models\LogTarget;
use Illuminate\Database\Eloquent\Collection;

interface LogControllerInterface
{
    /**
     * Get all logs.
     *
     * @return Collection
     */
    public function index(): Collection;

    /**
     * Create a new log.
     *
     * @param array $data
     * @return Log
     */
    public function store(array $data): Log;

    /**
     * Update a log by ID.
     *
     * @param int $id
     * @param array $data
     * @return Log
     */
    public function update(int $id, array $data): Log;

    /**
     * Delete a log by ID.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void;

    /**
     * Get logs by log level.
     *
     * @param LogLevel $logLevel
     * @return Collection
     */
    public function getLogsByLogLevel(LogLevel $logLevel): Collection;

    /**
     * Get logs by log target.
     *
     * @param LogTarget $logTarget
     * @return Collection
     */
    public function getLogsByLogTarget(LogTarget $logTarget): Collection;

    /**
     * Get logs by log level and log target.
     *
     * @param LogLevel $logLevel
     * @param LogTarget $logTarget
     * @return Collection
     */
    public function getLogsByLogLevelAndLogTarget(LogLevel $logLevel, LogTarget $logTarget): Collection;
}
