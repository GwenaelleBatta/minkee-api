<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplyRequest extends FormRequest
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
            'name' => 'required',
            'color'=>'nullable',
            'quantity'=>"nullable",
            'number'=>"nullable",
            'tint'=>"nullable",
            'category'=>"nullable",
            'width'=>"nullable",
            'pictures'=>"nullable",
            "typesupply_id" => "required",
        ];
    }
}
