<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogLevelTargetRequest extends FormRequest
{
    public function authorize()
    {
        return true; // You can define authorization logic here if needed.
    }

    public function rules()
    {
        return [
            'log_level_id' => 'required|exists:log_levels,id', // Ensure log_level_id exists in log_levels table
            'target_id' => 'required|exists:log_targets,id', // Ensure target_id exists in log_targets table
        ];
    }
}

