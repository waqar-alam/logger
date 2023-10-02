<?php

// app/Models/Log.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['message', 'log_level_id', 'log_target_id'];

    public function logLevel()
    {
        return $this->belongsTo(LogLevel::class);
    }

    public function logTarget()
    {
        return $this->belongsTo(LogTarget::class);
    }
}

