<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'title'         => ['required', Rule::unique('apartments')->ignore($this->apartment), 'string', 'max:255'],
            'description'   => ['nullable'],
            'room_n'        => ['integer', 4, 'required'],
            'bed_n'         => ['integer', 4, 'required'],
            'bath_n'        => ['integer', 4, 'required'],
            'square_meters' => ['integer', 11, 'required'],
            'address'       => ['string', 'max:255', 'required'],
            'cover_image'   => ['string', 'required'],
        ];
    }
}
