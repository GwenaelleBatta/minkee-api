<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanUpdateRequest extends FormRequest
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
            'base' => 'required',
            'gender' => 'required',
            'type' => 'required',
            'price' => 'required',
            //'supplies' => 'required',
            'images' => 'nullable',
            'newImages' => 'nullable|array',
            'newImages.*' => 'mimes:jpg,jpeg,png,webp,svg',
            'cut' => 'nullable',
            'level_id'=>'required',


        ];
    }
}
