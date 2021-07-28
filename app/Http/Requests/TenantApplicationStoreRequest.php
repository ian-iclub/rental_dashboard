<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantApplicationStoreRequest extends FormRequest
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
            'current_location' => 'required',
            'duration_stayed' => 'required',
            'landlord_details' => 'required',
            'landlord_name' => 'nullable',
            'landlord_phone' => 'nullable',
            'landlord_address' => 'nullable',
            'moving_reason' => 'required',
            'current_rent' => 'required',
            'current_house_type' => 'required',
            'apartment_interest' => 'required',
            'duration_staying' => 'required',
        ];
    }
}
