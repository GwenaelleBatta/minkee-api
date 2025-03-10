<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
            'supplies' => 'required',
            'images' => 'nullable|array',
            'images.*' => 'mimes:jpg,jpeg,png,webp,svg',
            'cut' => 'nullable|mimes:jpg,jpeg,png,webp,svg',
            'level_id'=>'required',


        ];
    }
}
