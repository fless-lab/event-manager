<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventsRequest extends FormRequest
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
            "title"=>"required",
            "description"=>"required",
            "place"=>"required",
            "cover"=>"required",
            "start_date"=>"required",
            "start_time"=>"required",
            "end_date"=>"required",
            "end_time"=>"required",
        ];
    }
    public function messages(){
        return[
            "title.required"=>"Le champs titre est requis",
            "description.required"=>"Le champs description est requis",
            "place.required"=>"Le champs lieu est requis",
            "cover.required"=>"L'image est requis",
            "start_date"=>"La date de début est requis",
            "start_time"=>"L'heure de début est requis",
            "end_date.required"=>"La date de fin est requis",
            "end_time.required"=>"Le temps de fin est requis",
        ];
    }
}
