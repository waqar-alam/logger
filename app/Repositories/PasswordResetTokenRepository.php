<?php

// app/Repositories/PasswordResetTokenRepository.php

namespace App\Repositories;

use App\Models\PasswordResetToken;

class PasswordResetTokenRepository
{
    protected $model;

    public function __construct(PasswordResetToken $model)
    {
        $this->model = $model;
    }

    public function getByToken($token)
    {
        return $this->model->where('token', $token)->first();
    }

    // Add other methods for password reset token-related operations
}
