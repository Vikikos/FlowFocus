<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TimeblockRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:50'],
            'start' => ['required', 'date', 'date_format:Y-m-d H:i'],
            'end'   => ['required', 'date', 'date_format:Y-m-d H:i', 'after:start'],
            'color' => ['nullable', 'string', 'max:20'],
        ];
    }
}
