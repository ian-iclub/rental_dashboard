<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WaterPaymentStoreRequest extends FormRequest
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
            'meter_reading' => 'required',
            'units_spent' => 'required',
            'amount' => 'required',
            'method' => 'required',
            'date_paid' => 'required',
            'date_read' => 'required'
        ];
    }
}
