<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CongeRequest extends FormRequest
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
            //
        'DateDeb'=>'required|date|after:tomorrow',
        'DateFin'=>'required|date|after_or_equal:DateDeb',
        'Date_demnd'=>'required|date_equals:today',
        ];
    }
}
