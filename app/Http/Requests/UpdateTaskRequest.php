<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;

class UpdateTaskRequest extends BaseFormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'completed' => 'nullable|boolean|default:false',
            'user_id' => 'required|integer|exists:users,id'
        ];
    }
}
