<?php

// app/Models/LogTarget.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogTarget extends Model
{
    protected $fillable = ['name'];

    public function levelTargets()
    {
        return $this->hasMany(LogLevelTarget::class);
    }

    public function sendLog($logEntry)
    {
        switch ($this->name) {
            case 'console':
                // Send the log entry to the console output
                $this->sendToConsole($logEntry);
                break;

            case 'email':
                // Send the log entry via email using the stored email settings
                $this->sendToEmail($logEntry, $this->email_address, $this->email_subject);
                break;

            case 'file':
                // Send the log entry to a file using the stored file settings
                $this->sendToFile($logEntry, $this->file_path, $this->file_permission);
                break;

            // Add more cases for other target types as needed

            default:
                // Handle unsupported or unknown target types
                throw new \InvalidArgumentException("Unsupported log target type: {$this->name}");
        }
    }

    protected function sendToConsole($logEntry)
    {
        // Output the log entry to the console (e.g., using Laravel's Log::info or echo)
        \Log::info('Console Log Entry: ' . $logEntry);
    }

    protected function sendToEmail($logEntry, $emailAddress, $emailSubject)
    {
        // Send the log entry via email to the specified email address
        // You would implement email sending logic here
    }

    protected function sendToFile($logEntry, $filePath, $filePermission)
    {
        // Save the log entry to a file at the specified path with the given permission
        // You would implement file writing logic here
    }
}

