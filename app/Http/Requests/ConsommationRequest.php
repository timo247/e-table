<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsommationRequest extends FormRequest
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
            'nom'=>'required|min:2|max:30|alpha',
        	'description'=>'required|alpha',
            'image_url'=>'required|min:2|max:255|alpha',
            'categorie'=>'required|alpha',
            'prix' => ['required|numeric'],
            'tags' => 'required|alpha',
            'etablissement_id' => 'required|numeric'
        ];
    }
}
