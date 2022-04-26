<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'date_in'=>['required','date'],
			'reference'=>['required','string'],
			'designation'=>['required','string'],
			'brand'=>['required','string'],
			'quantity_in'=>['required','integer','min:1'],
			'provider_id'=>['required','exists:App\Models\Provider,id'],
			'price_in'=>['required','integer','min:1'],
			
        ];
    }
}
