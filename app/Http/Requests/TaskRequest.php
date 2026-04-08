<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'name'            => 'required|string|max:255',
            'description'     => 'required|string',
            'state'           => 'required|string|in:pending,in_progress,completed',
            'expiration_date' => 'required|date',
        ];
    }
}
