<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'role_id' => ['required', 'numeric'],
            'department_id' => ['required', 'numeric'],
            'active' => ['nullable', 'string']
        ];
    }
    
    public function fields(): array
    {
        $inputData = [];

        $inputData['role_id'] = $this->input('role_id');
        $inputData['department_id'] = $this->input('department_id');
        $inputData['active'] = $this->input('active');

        if ($this->input('user_id')) {
            $inputData['updated_by'] = loggedInUserId();
            $inputData['updated_at'] = createdAtDateConvertToDB();
        } else {
            $inputData['created_by'] = loggedInUserId();
            $inputData['created_at'] = createdAtDateConvertToDB();
        }

        return $inputData;
    }
}
