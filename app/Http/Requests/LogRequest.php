<?php

// app/Http/Requests/LogRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'log_level_id' => 'required|exists:log_levels,id',
            'log_target_id' => 'required|exists:log_targets,id',
            'message' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'log_level_id.required' => 'The log level is required.',
            'log_level_id.exists' => 'The selected log level does not exist.',
            'log_target_id.required' => 'The log target is required.',
            'log_target_id.exists' => 'The selected log target does not exist.',
            'message.required' => 'The log message is required.',
            'message.string' => 'The log message must be a string.',
        ];
    }
}

