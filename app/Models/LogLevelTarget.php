<?php

// app/Models/LogLevelTarget.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogLevelTarget extends Model
{
    protected $fillable = ['log_level_id', 'log_target_id'];

    public function logLevel()
    {
        return $this->belongsTo(LogLevel::class);
    }

    public function logTarget()
    {
        return $this->belongsTo(LogTarget::class);
    }
}

