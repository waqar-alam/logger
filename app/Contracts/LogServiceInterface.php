<?php

namespace App\Contracts;

use App\Models\Log;
use App\Models\LogLevel;
use App\Models\LogTarget;
use Illuminate\Database\Eloquent\Collection;

interface LogServiceInterface
{
    /**
     * Get all logs.
     *
     * @return Collection
     */
    public function getAllLogs(): Collection;

    /**
     * Create a new log.
     *
     * @param array $data
     * @return Log
     */
    public function createLog(array $data): Log;

    /**
     * Get a log by ID.
     *
     * @param string $id
     * @return Log|null
     */
    public function getLogById(string $id): ?Log;

    /**
     * Update a log by ID.
     *
     * @param string $id
     * @param array $data
     * @return Log
     */
    public function updateLogById(string $id, array $data): Log;

    /**
     * Delete a log by ID.
     *
     * @param string $id
     * @return void
     */
    public function deleteLogById(string $id): void;

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
}

