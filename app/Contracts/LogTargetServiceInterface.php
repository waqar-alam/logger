<?php

namespace App\Contracts;

use App\Models\LogTarget;

interface LogTargetServiceInterface
{
    /**
     * Get all log targets.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllLogTargets();

    /**
     * Create a new log target.
     *
     * @param array $data
     * @return \App\Models\LogTarget
     */
    public function createLogTarget(array $data);

    /**
     * Update a log target by ID.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\LogTarget
     */
    public function updateLogTargetById(int $id, array $data);

    /**
     * Delete a log target by ID.
     *
     * @param int $id
     * @return void
     */
    public function deleteLogTargetById(int $id);

    /**
     * Get log targets for a specific log level.
     *
     * @param \App\Models\LogTarget $logTarget
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLogTargetsForLogLevel(LogTarget $logTarget);
}
