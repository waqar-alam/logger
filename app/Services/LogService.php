<?php

// app/Services/LogService.php

namespace App\Services;

use App\Contracts\LogServiceInterface;
use App\Models\Log;
use App\Models\LogLevel;
use App\Models\LogTarget;
use Illuminate\Database\Eloquent\Collection;

class LogService implements LogServiceInterface
{
    public function getLogsByLogLevel(LogLevel $logLevel): Collection
    {
        return Log::where('log_level_id', $logLevel->id)->get();
    }

    public function getLogsByLogTarget(LogTarget $logTarget): Collection
    {
        return Log::where('log_target_id', $logTarget->id)->get();
    }

    public function createLog(array $data): Log
    {
        return Log::create($data);
    }

    public function updateLogById(int $id, array $data): Log
    {
        $log = Log::findOrFail($id);
        $log->update($data);

        return $log;
    }

    public function deleteLogById(int $id): void
    {
        $log = Log::findOrFail($id);
        $log->delete();
    }

    public function filterLogsByLogLevel(LogTarget $logTarget, LogLevel $logLevel): Collection
    {
        return Log::where('log_target_id', $logTarget->id)
            ->where('log_level_id', $logLevel->id)
            ->get();
    }

    public function filterLogsByLogTarget(LogLevel $logLevel, LogTarget $logTarget): Collection
    {
        return Log::where('log_level_id', $logLevel->id)
            ->where('log_target_id', $logTarget->id)
            ->get();
    }
}

