<?php

namespace App\Services;

use App\Models\LogLevel;
use Illuminate\Support\Collection;

class LogLevelService
{
    public function getLogLevelByName(string $name): ?LogLevel
    {
        // Implement the logic to retrieve a log level by name.
        // You can use the Eloquent model or any other method to fetch the data.
        return LogLevel::where('name', $name)->first();
    }

    public function getAllLogLevels(): Collection
    {
        // Implement the logic to retrieve all log levels.
        // You can use the Eloquent model or any other method to fetch the data.
        return LogLevel::all();
    }

    public function createLogLevel(array $data): LogLevel
    {
        // Implement the logic to create a new log level using the provided data.
        // You can use the Eloquent model or any other method to create the record.
        return LogLevel::create($data);
    }

    public function updateLogLevelByName(string $name, array $data): ?LogLevel
    {
        // Implement the logic to update a log level by name using the provided data.
        // You can use the Eloquent model or any other method to update the record.
        $logLevel = LogLevel::where('name', $name)->first();

        if ($logLevel) {
            $logLevel->update($data);
        }

        return $logLevel;
    }

    public function deleteLogLevelByName(string $name): void
    {
        // Implement the logic to delete a log level by name.
        // You can use the Eloquent model or any other method to perform the deletion.
        LogLevel::where('name', $name)->delete();
    }
}
