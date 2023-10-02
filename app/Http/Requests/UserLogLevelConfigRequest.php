<?php

// app/Http/Requests/UserLogLevelConfigRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLogLevelConfigRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|integer',
            'log_level_preference' => 'required|in:Debug,Info,Warning,Error',
        ];
    }
}

