<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'event_id'=> 'required',
            'nbre'=>'required',
            'prix'=>'required'
        ];
    }
    public function messages()
    {
        return[
            'event_id.required'=>'Le titre de l\evenement est requis',
            'nbre.required'=>'Le nombre est requis',
            'prix.required'=>'Le prix est requis',
        ];
    }
}
