<?php

// app/Jobs/LogMessageJob.php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LogMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $logMessage;

    /**
     * Create a new job instance.
     *
     * @param string $logMessage
     */
    public function __construct(string $logMessage)
    {
        $this->logMessage = $logMessage;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Implement your logic to process the log message here
        // For example, you can send the message to various log targets

        // You can access $this->logMessage to get the log message content
        $logMessageContent = $this->logMessage;

        // Example: Send the log message to the console
        \Log::info("Logged message: $logMessageContent");

        // You can add more logic here to send the message to other log targets
    }
}
