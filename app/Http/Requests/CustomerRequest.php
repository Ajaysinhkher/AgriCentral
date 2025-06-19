<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
        $userId = $this->route('id'); // used for update validation

        // dd('inside validation');
        return [
            
            'name' => 'required|string|max:255|unique:users,name,' . $userId,
            'email' => 'required|email|max:255|unique:users,email,' . $userId,
            'phone' => 'required|digits:10|unique:users,phone,' . $userId,
            'password' => $this->isMethod('post') ? 'required|string|min:6|confirmed' : 'nullable|string|min:6|confirmed',
            'status' => 'required|in:active,inactive',
        ];


    }
}
