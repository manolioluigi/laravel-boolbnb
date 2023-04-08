<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentRequest extends FormRequest
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
            'title'             => ['required', 'unique:apartments', 'max:255'],
            'description'       => ['nullable'],
            'room_n'            => ['required', 'max:4'],
            'bed_n'             => ['required', 'max:4'],
            'bath_n'            => ['required', 'max:4'],
            'square_meters'     => ['required', 'max:11'],
            'address'           => ['required', 'max:255'],
            'visible'           => ['required'],
            'cover_img'         => ['required', 'image']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A Title is Requied',
            'title.unique' => 'This Title already Exist',
            'title.max' => 'Title cannot excede 255 characters',
            'room_n.required' => 'Imput a number',
            'room_n.max' => 'The number of Rooms cannot excede 4 chatacters',
            'bed_n.required' => 'Imput a number',
            'bed_n.max' => 'The number of Beds cannot excede 4 chatacters',
            'bath_n.required' => 'Imput a number',
            'bath_n.max' => 'The number of Bathrooms cannot excede 4 chatacters',
            'square_meters.required' => 'Imput a number',
            'square_meters.max' => 'Square Meters cannot excede 11 characters',
            'address.required' => 'Adress Requied',
            'address.max' => 'Adress cannot excede 255 characters',
            'cover_img.image' => 'Input a Valid Imagine format',
            'cover_img.required' => 'Cover Imagine is Requied',
            'cover_img.max' => 'Imagine is Oversized'
        ];
    }
}
