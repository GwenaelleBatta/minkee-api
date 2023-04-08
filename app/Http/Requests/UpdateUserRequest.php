<?php

namespace App\Http\Requests;

use App\Rules\MatchOldPassword;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'firstname' => 'required',
            'status_id' => 'required',
            'newsletter' => 'nullable',
            'description'=>'min:20|max:300|nullable',
            'avatar' => 'nullable|mimes:jpg,png,webp,svg',
            'avatars' => 'nullable',
            'srcset' => 'nullable',
            'back_image'=> 'nullable|mimes:jpg,png,webp,svg',
            'back_images'=> 'nullable',
            'srcset_back' => 'nullable',
            'email' => 'required|email',
            'password_old' => ['required_with:password_new','nullable', new MatchOldPassword],
            'password_new' => 'nullable|min:8|max:64',

        ];
    }
}
