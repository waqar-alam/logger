<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email', 'password'];

    public function passwordResetTokens()
    {
        return $this->hasMany(PasswordResetToken::class);
    }
}
