<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'photo' => 'required',
            'filename' => 'required',

        ];
    }

    /**
     * Validation messages if the validation fails
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name is required',
            'address.unique' => 'This address is required',
            'phone.required' => 'The phone is required',
            'photo.required' => 'The photo is required',
            'filename.required' => 'The file name is required'
        ];
    }
}
