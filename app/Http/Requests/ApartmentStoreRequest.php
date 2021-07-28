<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentStoreRequest extends FormRequest
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
            'number' => 'required|unique:apartments',
            'type' => 'required',
            'floor' => 'required',
            'meter_number' => 'required',
            'rent' => 'required|integer',
            'rent_deposit' => 'required|integer',
            'water_deposit' => 'required|integer',
            'status' => 'required|boolean',

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
            'number.required' => 'The house number is required',
            'number.unique' => 'This house number already exists',
            'type.required' => 'The house type is required',
            'floor.required' => 'The floor is required',
            'meter_number.required' => 'The meter number is required',
            'rent_deposit.required' => 'The rent deposit is required',
            'water_deposit.required' => 'The rent deposit is required',
            'status.required' => 'The occupancy status is required',
        ];
    }
}
