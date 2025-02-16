<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
        $validationData = [];

        $validationData['full_name'] = ['required', 'string'];
        $validationData['email'] = ['required', 'email', 'unique:users'];
        $validationData['phone'] = ['required', 'string', 'unique:users'];
        $validationData['role_id'] = ['required', 'numeric'];
        $validationData['user_name'] = ['required', 'string'];
        $validationData['password'] = ['required', 'string'];
        $validationData['address'] = ['required', 'string'];
        $validationData['country'] = ['nullable', 'string'];
        $validationData['nid'] = ['nullable', 'numeric', 'unique:users'];
        $validationData['diamond_per_usd'] = ['required', 'numeric'];
        $validationData['active'] = ['nullable', 'string'];


        if ($this->input('id')) {
            $validationData['phone'] = ['required', Rule::unique('users', 'phone')->ignore($this->input('id'), 'id')];
            $validationData['email'] = ['required', Rule::unique('users', 'email')->ignore($this->input('id'), 'id')];
            $validationData['nid'] = ['required', Rule::unique('users', 'nid')->ignore($this->input('id'), 'id')];
        }

        return $validationData;
    }

    public function fields(): array
    {
        $inputData = [];

        $inputData['full_name'] = $this->input('full_name');
        $inputData['email'] = $this->input('email');
        $inputData['phone'] = $this->input('phone');
        $inputData['role_id'] = $this->input('role_id');
        $inputData['user_name'] = $this->input('user_name');
        $inputData['password'] = $this->input('password');
        $inputData['address'] = $this->input('address');
        $inputData['country'] = $this->input('country') ?? null;
        $inputData['nid'] = $this->input('nid') ?? null;
        $inputData['diamond_per_usd'] = $this->input('diamond_per_usd');
        $inputData['active'] = $this->input('active');

        if ($this->input('id')) {
            $inputData['updated_by'] = loggedInUserId();
            $inputData['updated_at'] = createdAtDateConvertToDB();
        } else {
            $inputData['created_by'] = loggedInUserId();
            $inputData['created_at'] = createdAtDateConvertToDB();
        }

        return $inputData;
    }
}
