<?php

// app/Models/LogLevel.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class LogLevel extends Model
{
    protected $fillable = ['name'];

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function levelTargets()
    {
        return $this->belongsToMany(LogTarget::class); // Define the many-to-many relationship
    }
}

