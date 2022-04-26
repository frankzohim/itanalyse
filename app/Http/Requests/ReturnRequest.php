<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReturnRequest extends FormRequest
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
            'date' => ['required', 'date'],
            'reference' => ['required', 'string'],
            'designation' => ['required', 'string'],
			'quantite' => ['required', 'integer'],
			'bc' => ['required', 'string'],
			'bl' => ['required', 'string'],
			'motif' => ['required', 'string'],
			'observation' => ['required', 'string'],
			'entreprise' => ['required', 'string'],
			'fournisseur' => ['required', 'string'],
        ];
    }
}
