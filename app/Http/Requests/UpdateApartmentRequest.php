<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApartmentRequest extends FormRequest
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
            'title'         => 'required|string|max:255',
            'description'   => 'nullable',
            'room_n'        => 'integer|max:4| required',
            'bed_n'         => 'integer|max:4| required',
            'bath_n'        => 'integer|max:4| required',
            'square_meters' => 'integer|max:11| required',
            'address'       => 'string|max:255|required',
            'cover_image'   => 'string|required'
        ];
    }

//     public function messages()
//     {
//         return [
//             'title.required' => 'Il titolo è richiesto',
//             'title.unique' => 'E\ già presente questo titolo',
//             'title.max' => 'Il titolo può essere lungo al massimo 150 cratteri',
//             'cover_image.image' => 'Inserire un formato di immagine valido',
//         ];
//     }
 }