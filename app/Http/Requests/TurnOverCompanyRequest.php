<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurnOverCompanyRequest extends FormRequest
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
            'company_id' => ['required','exists:App\Models\Company,id'],
            'year' => ['required','integer','digits:4','min:2018'],
            'month' => ['required','integer','min:1', 'max:12'],
            'sales_amount' => ['required','integer'],
            'quotes_amount' => ['required','integer'],
            'quotes' => ['required','integer'],
            'sales' => ['required','integer'],
        ];
    }
}
