<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PomodoroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge(json_decode($this->getContent(), true) ?? []);
    }

    public function rules(): array
    {
        return [
            'predetermined' => 'required|string|max:255',
            'work_duration'   => 'required|integer|min:1',
            'break_duration'  => 'required|integer|min:1',
            'total_sessions'  => 'required|integer|min:1',
        ];
    }
}
