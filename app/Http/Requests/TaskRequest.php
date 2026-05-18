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
            'name'            => 'required|string|max:50',
            'description'     => 'required|string|max:255',
            'column'           => 'string|in:new,progress,done',
            'expiration_date' => 'required|date',
        ];
    }
}
