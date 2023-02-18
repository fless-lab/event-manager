<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TTicketRequest extends FormRequest
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
            'ticket_id'=> 'required',
            'libelle'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'ticket_id.required'=>'Le prix du ticket',
            'libelle.required'=>'Le libelle est requis',
        ];
    }
}
