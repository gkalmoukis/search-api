<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchListingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'location' => ['array'],
            'location.*' => ['numeric', 'exists:locations,id'],
            'priceMin' => ['numeric', 'min:10', 'max:10000000'],
            'priceMax' => ['numeric', 'min:10', 'max:10000000'],
            'squareMetersMin' => ['numeric', 'min:20', 'max:10000'],
            'squareMetersMax' => ['numeric', 'min:20', 'max:10000'],
        ];
    }
}
